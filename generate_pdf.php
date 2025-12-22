<?php
require('fpdf/fpdf.php');
include('db_Connect.php');

if (!isset($_GET['gen_pdf']) || !isset($_GET['id'])) {
    die("Invalid request");
}

$booking_id = (int)$_GET['id'];

/* FETCH BOOKING DATA */
$q = "SELECT * FROM booking_order WHERE booking_id = $booking_id";
$res = mysqli_query($con, $q);

if (!$res || mysqli_num_rows($res) == 0) {
    die("Invoice not found");
}

$data = mysqli_fetch_assoc($res);

/* FORMAT DATES */
$checkin  = date('d M Y', strtotime($data['check_in']));
$checkout = date('d M Y', strtotime($data['check_out']));
$bookedOn = date('d M Y', strtotime($data['datentime']));

/* CREATE PDF */
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

/* HEADER */
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 10, 'DC HOTELS', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 6, 'Hotel Booking Invoice', 0, 1, 'C');

$pdf->Ln(5);

/* INVOICE META */
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, 'Invoice No: INV-' . $data['booking_id'], 0, 0);
$pdf->Cell(0, 6, 'Date: ' . $bookedOn, 0, 1);

$pdf->Cell(100, 6, 'Order ID: ' . $data['order_id'], 0, 0);
$pdf->Cell(0, 6, 'Payment ID: ' . $data['payment_id'], 0, 1);

$pdf->Ln(8);

/* CUSTOMER DETAILS */
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, 'Customer Details', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, 'Name: ' . $data['user_name'], 0, 1);
$pdf->Cell(0, 6, 'Phone: ' . $data['phonenum'], 0, 1);

$pdf->Ln(5);

/* BOOKING DETAILS */
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, 'Booking Details', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, 'Room: ' . $data['room_name'], 0, 1);
$pdf->Cell(0, 6, 'Room Number: ' . ($data['room_no'] ?? 'Not Assigned'), 0, 1);
$pdf->Cell(0, 6, 'Check-in: ' . $checkin, 0, 1);
$pdf->Cell(0, 6, 'Check-out: ' . $checkout, 0, 1);

$pdf->Ln(8);

/* PAYMENT TABLE HEADER */
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(120, 8, 'Description', 1);
$pdf->Cell(30, 8, 'Price', 1);
$pdf->Cell(30, 8, 'Total', 1, 1);

/* PAYMENT TABLE BODY */
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(120, 8, $data['room_name'] . ' (Per Night)', 1);
$pdf->Cell(30, 8, 'Rs. ' . $data['price'], 1);
$pdf->Cell(30, 8, 'Rs. ' . $data['total_pay'], 1, 1);

/* TOTAL */
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(150, 8, 'Grand Total', 1);
$pdf->Cell(30, 8, 'Rs. ' . $data['total_pay'], 1, 1);

$pdf->Ln(8);

/* PAYMENT STATUS */
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, 'Payment Status: ' . strtoupper($data['booking_status']), 0, 1);
$pdf->Cell(0, 6, 'Transaction Message: ' . $data['trans_resp_msg'], 0, 1);

$pdf->Ln(10);

/* FOOTER */
$pdf->SetFont('Arial', 'I', 9);
$pdf->Cell(0, 6, 'Thank you for booking with DC Hotels!', 0, 1, 'C');
$pdf->Cell(0, 6, 'For any queries, contact support@dchotels.com', 0, 1, 'C');

/* FORCE DOWNLOAD */
$pdf->Output('D', 'Invoice_DC_Hotels_'.$data['booking_id'].'.pdf');
exit;
