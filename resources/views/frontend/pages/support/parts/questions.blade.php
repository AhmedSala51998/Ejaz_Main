
<div class="accordion" id="faqAccordion">

    @foreach($questions as $question)
        <!-- question -->
        <div class="accordion-item " data-aos=" fade-up">
            <h2 class="accordion-header">
                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#question{{$question->id}}"
                        aria-controls="question{{$question->id}}">
                    {{$question->title}}
                </button>
            </h2>
            <div id="question{{$question->id}}" class="accordion-collapse collapse " data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{$question->desc}}
                </div>
            </div>
        </div>
    @endforeach




</div>
