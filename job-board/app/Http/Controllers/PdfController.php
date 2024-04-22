<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Libraries\Fpdf\FPDF;;

class PdfController extends Controller
{
    public function generateJobsReport()
    {
        // Fetch data from the database
        $jobs = Job::all();

        // Initialize PDF object
        $pdf = new FPDF('P', 'mm', array(500, 297));
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('Arial', 'B', 12);

        // Add table header
        $pdf->Cell(20, 10, 'ID', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(40, 10, 'Title', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(60, 10, 'Description', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Salary', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Location', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Category', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Experience', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Created At', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Updated At', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Cell(30, 10, 'Employer ID', 1); // Specify cell width and height, and draw a border around the cell
        $pdf->Ln(); // Move to the next line

        // Set font for the table data
        $pdf->SetFont('Arial', '', 10);

        // Add table data
        foreach ($jobs as $job) {
            $pdf->Cell(20, 40, $job->id, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(40, 40, $job->title, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(60, 40, $job->description, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->salary, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->location, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->category, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->experience, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->created_at, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->updated_at, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Cell(30, 40, $job->employer_id, 1); // Specify cell width and height, and draw a border around the cell
            $pdf->Ln(); // Move to the next line
        }

        // Output the PDF to the browser or save it to a file
        $pdf->Output('jobs_report.pdf', 'D');
    }
}

