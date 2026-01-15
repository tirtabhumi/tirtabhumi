<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion - {{ $training->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: #f0f0f0;
            print-color-adjust: exact; 
            -webkit-print-color-adjust: exact;
        }
        .certificate-container {
            width: 297mm;
            height: 210mm;
            background: #fff;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(#4f46e5 0.5px, transparent 0.5px);
            background-size: 20px 20px;
            opacity: 0.05;
            z-index: 0;
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        @media print {
            body {
                background: none;
                margin: 0;
            }
            .certificate-container {
                box-shadow: none;
                margin: 0;
                width: 100%;
                height: 100vh;
                page-break-after: always;
            }
            .no-print {
                display: none !important;
            }
            @page {
                size: landscape;
                margin: 0;
            }
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen py-8">

    <div class="no-print mb-6 flex gap-4">
        <button onclick="window.print()" class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-lg shadow-lg hover:bg-indigo-700 transition">
            Print / Save as PDF
        </button>
        <a href="{{ route('my-classes.index') }}" class="px-6 py-2 bg-white text-slate-600 font-bold rounded-lg shadow hover:bg-slate-50 transition border border-slate-200">
            Back to Dashboard
        </a>
    </div>

    <div class="certificate-container flex flex-col items-center justify-center text-center p-16 border-8 border-double border-indigo-50 relative">
        <!-- Background Elements -->
        <div class="bg-pattern"></div>
        <div class="decorative-circle w-96 h-96 bg-indigo-100/30 -top-20 -left-20"></div>
        <div class="decorative-circle w-80 h-80 bg-purple-100/30 -bottom-20 -right-20"></div>

        <!-- Content -->
        <div class="relative z-10 w-full h-full flex flex-col justify-between">
            
            <!-- Header Logos -->
            <div class="flex justify-between items-center w-full px-8">
                <img src="{{ asset('images/logo.png') }}" alt="Tirta Bhumi" class="h-16 object-contain">
                <div class="text-right">
                    <h2 class="text-xl font-bold text-indigo-600 tracking-tighter">UpVenture</h2>
                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">Learning Platform</p>
                </div>
            </div>

            <!-- Main Text -->
            <div class="flex-grow flex flex-col justify-center items-center mt-4">
                <h3 class="text-indigo-600 tracking-[0.2em] uppercase font-bold text-sm mb-4">Certificate of Completion</h3>
                
                <h1 class="text-5xl font-light text-slate-800 mb-2">
                    {{ $user->name }}
                </h1>
                
                <div class="w-24 h-1 bg-indigo-600 rounded-full mb-8"></div>

                <p class="text-slate-600 text-lg mb-2">Has successfully completed the course</p>
                
                <h2 class="text-4xl font-bold text-slate-800 mb-6 max-w-4xl leading-tight">
                    {{ $training->title }}
                </h2>

                <p class="text-slate-500 italic max-w-2xl">
                    "{{ strip_tags($training->description) }}"
                </p>
            </div>

            <!-- Footer / Signatures -->
            <div class="flex justify-between items-end w-full px-12 mt-8">
                <div class="text-center">
                    <p class="text-indigo-600 font-bold text-lg">PT Tirta Bhumi Indonesia</p>
                    <div class="w-48 h-px bg-slate-300 my-2"></div>
                    <p class="text-xs text-slate-400 uppercase tracking-wider">Organizer</p>
                </div>

                <div class="flex flex-col items-end text-right">
                     <!-- QR Verification Mockup -->
                    <div class="mb-2 p-2 bg-white border border-slate-200 rounded">
                         <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-xs text-slate-400 font-mono">ID: {{ $registration->transaction_id ?? $registration->id }}</p>
                    <p class="text-xs text-slate-400">Date: {{ now()->format('d F Y') }}</p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
