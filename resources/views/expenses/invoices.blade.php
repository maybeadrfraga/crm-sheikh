<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Invoice</h1>
        <p><strong>Description:</strong> {{ $expense->description }}</p>
        <p><strong>Amount:</strong> {{ $expense->amount }}</p>
        <p><strong>Date:</strong> {{ $expense->date }}</p>
        <p><strong>Company:</strong> {{ $expense->company->name }}</p>
    </div>
</body>
</html>
