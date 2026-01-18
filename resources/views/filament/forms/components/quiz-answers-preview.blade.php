@php
    // Ensure $answers is an array
    $processedAnswers = is_array($answers) ? $answers : (is_string($answers) ? json_decode($answers, true) : []);
    $iterator = $processedAnswers ?? [];
@endphp

<div class="space-y-4">
    @forelse($iterator as $index => $answerData)
        @php
            $question = $questions[$index] ?? null;
            $questionText = $question['question_text'] ?? $question['question'] ?? 'Question ' . ($index + 1);
            $type = $answerData['type'] ?? 'choice';
        @endphp
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
            <p class="font-bold text-slate-800 mb-2">{{ $index + 1 }}. {{ $questionText }}</p>
            
            @if($type === 'essay')
                <div class="p-3 bg-white rounded-lg border border-slate-100 text-slate-700">
                    <span class="text-xs font-bold text-slate-400 uppercase block mb-1">Student Answer:</span>
                    {!! nl2br(e($answerData['answer'] ?? 'No answer provided')) !!}
                </div>
            @else
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ ($answerData['is_correct'] ?? false) ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ($answerData['is_correct'] ?? false) ? 'Correct' : 'Incorrect' }}
                    </span>
                    <span class="text-slate-300">|</span>
                    <span class="text-sm text-slate-600">
                        Answer Index: <span class="font-mono">{{ $answerData['answer'] ?? 'N/A' }}</span>
                    </span>
                </div>
            @endif
        </div>
    @empty
        <div class="text-center py-6 text-slate-500 italic bg-slate-50 rounded-xl border border-dashed border-slate-200">
            No quiz answers found in this submission.
        </div>
    @endforelse
</div>
