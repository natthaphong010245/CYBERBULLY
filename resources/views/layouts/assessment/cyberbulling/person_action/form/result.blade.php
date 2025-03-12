{{-- resources/views/layouts/assessment/cyberbulling/person_action/index.blade.php --}}
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTI-CYBERBULLYING FAQ</title>
    <link rel="icon" href="./images/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(to bottom, #E5C8F6 0%, #929AFF @yield('gradient-percentage', '40%'));
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'K2D',
            sans-serif;
        }

        .modal {
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .modal.show {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            max-height: 90vh;
            height: 90vh;
            display: flex;
            flex-direction: column;
        }

        .modal-body {
            flex: 1;
            overflow-y: auto;
        }

        input[type="radio"] {
            appearance: none;
            border: 2px solid #ccc;
            border-radius: 50%;
            outline: none;
            transition: all 0.2s ease;
        }

        input[type="radio"]:checked {
            background-color: #928AE1;
            border-color: #928AE1;
            position: relative;
        }

        input[type="radio"]:checked::after {
            content: "✓";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 14px;
            font-weight: bold;
            line-height: 1;
        }

        .question-answered .question-title,
        .question-answered .option-text {
            color: #4B5563;
        }

        .question-answered input[type="radio"] {
            border-color: #9CA3AF;
        }

        .selected-option input[type="radio"] {
            border-color: #928AE1;
            border-width: 2.5px;
        }

        .selected-option .option-text {
            font-weight: 500;
        }
    </style>
</head>

<body class="relative">
    @include('layouts.assessment.cyberbulling.person_action.form.logo')
    @yield('scripts')
    @include('layouts.assessment.cyberbulling.person_action.script')
</body>

</html>