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
.custom-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    padding: 25px 0;
    flex-wrap: wrap;
}

.custom-pagination .page-item {
    transition: transform 0.2s ease;
}

.custom-pagination .page-item:hover {
    transform: translateY(-2px);
}

.custom-pagination .page-link {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid #f4a835;
    color: #f4a835;
    border-radius: 12px;
    padding: 10px 16px;
    font-weight: 600;
    font-size: 16px;
    /*box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);*/
    box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
    transition: all 0.3s ease;
}

.custom-pagination .page-link:hover {
    background: #f4a835;
    color: white;
    border-color: #f4a835;
}

.custom-pagination .active_ejaz .page-link {
    background-color: #f4a835 !important;
    color: white;
    border-color: #f4a835;
    pointer-events: none;
    box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
}
.custom-pagination .page-item.active_ejaz .page-link {
    box-shadow: none !important;
    filter: none !important;
    text-shadow: none !important;
    outline: none !important;
    border-bottom: none !important;
    border-image: none !important;
    border-style: solid !important;
    border-width: 1px !important;
}
.page-link {
    box-shadow: none !important;
}

.page-item.active .page-link::after,
.page-item.active .page-link::before {
    display: none !important;
    box-shadow: none !important;
}
.custom-pagination .page-item.active_ejaz .page-link {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;
    box-shadow: none !important;
    filter: none !important;
    outline: none !important;
    border-bottom: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link::before,
.custom-pagination .page-item.active_ejaz .page-link::after {
    display: none !important;
    content: none !important;
    box-shadow: none !important;
}

.custom-pagination .page-item.actiactive_ejazve .page-link,
.custom-pagination .page-link:focus {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;

    outline: none !important;
    filter: none !important;
    text-shadow: none !important;
}
.custom-pagination .page-item.active_ejaz .page-link,
.custom-pagination .page-item.active_ejaz .page-link:focus,
.custom-pagination .page-item.active_ejaz .page-link:active,
.custom-pagination .page-link:focus,
.custom-pagination .page-link:active {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    text-shadow: none !important;
    outline: none !important;
    filter: none !important;
}

.custom-pagination .page-item.active_ejaz span.page-link {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    outline: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link {
    box-shadow: none !important;
    outline: none !important;
    background-clip: padding-box !important;
    background-origin: border-box !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link:focus-visible,
.custom-pagination .page-item.active_ejaz .page-link:focus-within {
    outline: none !important;
    box-shadow: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link {
    border-radius: 12px !important;
    background-color: #f4a835 !important;
    border: 1px solid #f4a835 !important;
    color: white !important;
    box-shadow: none !important;

}
</style>
