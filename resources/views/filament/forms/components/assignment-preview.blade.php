@php
    $state = $state ?? (isset($getState) ? $getState() : null);
    // Normalize to array
    $files = is_array($state) ? $state : (is_string($state) ? [$state] : []);
    
    // Filter only image files for display
    $imageFiles = array_filter($files, function($file) {
        if (!is_string($file)) return false;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp']);
    });
@endphp

<div class="flex flex-col gap-4">
    @forelse($imageFiles as $filePath)
        <div class="flex flex-col gap-2">
            <div class="relative group rounded-xl overflow-hidden border border-slate-200 bg-slate-50">
                <img src="{{ asset('storage/' . $filePath) }}" 
                     alt="Submission Preview" 
                     class="max-w-full h-auto object-contain mx-auto transition-transform duration-300 group-hover:scale-105"
                     style="max-height: 400px;">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors pointer-events-none"></div>
            </div>
            <div class="text-[10px] text-slate-400 font-mono text-center">
                {{ $filePath }}
            </div>
        </div>
    @empty
        <div class="p-4 bg-slate-50 rounded-xl border border-dashed border-slate-300 text-slate-400 text-sm text-center italic">
            No image files attached for preview
        </div>
    @endforelse
</div>
