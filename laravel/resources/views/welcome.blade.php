<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraBridge | API Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white shadow-xl shadow-slate-200/50 rounded-3xl border border-slate-100">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-slate-800">API</h1>
                <p class="text-sm text-slate-400 font-medium uppercase tracking-wider">System Overview</p>
            </div>
            <div class="h-12 w-12 bg-indigo-50 rounded-2xl flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-transparent hover:border-indigo-100 transition-colors">
                <span class="text-slate-500 text-sm">Server</span>
                <span class="font-mono font-medium text-indigo-600">lara_bridge_api</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-transparent hover:border-indigo-100 transition-colors">
                <span class="text-slate-500 text-sm">Runtime</span>
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="font-mono font-medium">PHP 8.2</span>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-transparent hover:border-indigo-100 transition-colors">
                <span class="text-slate-500 text-sm">Status</span>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase">Operational</span>
            </div>
        </div>

        <!-- Footer / Version -->
        <div class="mt-8 pt-6 border-t border-slate-50 flex justify-between items-center text-[10px] text-slate-400 uppercase tracking-[0.2em]">
            <span>Build: 2.0.4</span>
            <a href="https://github.com/Viacheslav1998/lara-bridge-api" class="hover:text-indigo-500 transition-colors">Documentation &rarr;</a>
        </div>
    </div>

</body>
</html>
