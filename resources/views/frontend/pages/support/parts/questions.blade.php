<style>
/* ===== FAQ Accordion ===== */
#faqAccordion{
    display:flex;
    flex-direction:column;
    gap:18px;
}

#faqAccordion .accordion-item{
    background:rgba(255,255,255,.25);
    backdrop-filter:blur(18px);
    border-radius:18px;
    border:1px solid rgba(244,168,53,.35);
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    overflow:hidden;
    transition:all .4s ease;
}

#faqAccordion .accordion-item:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 40px rgba(244,168,53,.3);
}

/* ===== Question Button ===== */
#faqAccordion .accordion-button{
    background:transparent;
    font-weight:800;
    font-size:17px;
    color:#333;
    padding:18px 22px;
    border:none;
    box-shadow:none;
    transition:all .35s ease;
}

#faqAccordion .accordion-button::after{
    filter:brightness(0.5);
    transition:.3s;
}

#faqAccordion .accordion-button:not(.collapsed){
    background:linear-gradient(135deg,#f4a835,#ffb23c);
    color:#fff;
}

#faqAccordion .accordion-button:not(.collapsed)::after{
    filter:brightness(5);
    transform:rotate(180deg);
}

/* ===== Answer Body ===== */
#faqAccordion .accordion-body{
    background:#fff;
    padding:22px;
    font-size:16px;
    line-height:1.9;
    color:#555;
    border-top:1px dashed rgba(244,168,53,.3);
    animation:fadeAnswer .4s ease;
}

/* ===== Animation ===== */
@keyframes fadeAnswer{
    from{
        opacity:0;
        transform:translateY(-10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ===== Mobile ===== */
@media(max-width:575px){
    #faqAccordion .accordion-button{
        font-size:15px;
        padding:15px 18px;
    }
    #faqAccordion .accordion-body{
        padding:18px;
        font-size:15px;
    }
}
</style>
<div class="accordion" id="faqAccordion">

    @forelse($questions as $question)
        <div class="accordion-item" data-aos="fade-up">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#question{{ $question->id }}">
                    {{ $question->title }}
                </button>
            </h2>

            <div id="question{{ $question->id }}"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{ $question->desc }}
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">لا توجد أسئلة حالياً</p>
    @endforelse

</div>

{{-- Pagination --}}
@if ($questions instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-5 d-flex justify-content-center">
        {{ $questions->appends(request()->except('page'))
            ->links('vendor.pagination.custom') }}
    </div>
@endif
