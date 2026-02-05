<div class="accordion" id="faqAccordion">
    @forelse($questions as $question)
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#question{{ $question->id }}">
                {{ $question->title }}
            </button>
        </h2>
        <div id="question{{ $question->id }}" class="accordion-collapse collapse">
            <div class="accordion-body">
                {{ $question->desc }}
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">لا توجد أسئلة حالياً</p>
    @endforelse
</div>

@if ($questions instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="col-12 mt-4">
        <div class="d-flex justify-content-center">
            {{ $questions->appends(request()->except('page'))->links('vendor.pagination.custom') }}
        </div>
    </div>
@endif

<style>
#faqAccordion {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Accordion Item */
.accordion-item {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(244, 168, 53, 0.35);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.accordion-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(244, 168, 53, 0.3);
}

/* Button */
.accordion-button {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: transparent;
    font-weight: 800;
    font-size: 18px;
    color: #333;
    padding: 20px 25px;
    border: none;
    transition: all 0.35s ease;
}

.accordion-button .icon {
    transition: transform 0.35s ease, color 0.35s ease;
}

/* Open State */
.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg,#f4a835,#ffb23c);
    color: #fff !important;
}

.accordion-button:not(.collapsed) .icon {
    transform: rotate(180deg);
    color: #fff !important;
}

/* Body */
.accordion-body {
    background: #fff;
    padding: 22px;
    font-size: 16px;
    line-height: 1.9;
    color: #555;
    border-top: 1px dashed rgba(244, 168, 53, 0.3);
    animation: fadeAnswer 0.4s ease;
}

/* Animation */
@keyframes fadeAnswer {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Mobile */
@media(max-width:575px){
    .accordion-button {
        font-size: 16px;
        padding: 15px 18px;
    }
    .accordion-body {
        padding: 18px;
        font-size: 15px;
    }
}

.accordion-button::after {
    filter: invert(0);
    transition: transform .35s ease, filter .35s ease;
}
.accordion-button:not(.collapsed)::after {
    filter: brightness(0) invert(1);
    transform: rotate(180deg);
}
</style>
