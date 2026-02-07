<form id="FaqForm" action="{{ $action }}" method="POST">
    @csrf
    @if(isset($faq)) @method('PUT') @endif

    <div class="form-group">
        <label>السؤال</label>
        <input type="text" name="question" class="form-control" value="{{ $faq->question ?? '' }}" required>
    </div>

    <div class="form-group">
        <label>الإجابة</label>
        <textarea name="answer" class="form-control" rows="5" required>{{ $faq->answer ?? '' }}</textarea>
    </div>

    <div class="form-group">
        <label>الحالة</label>
        <select name="status" class="form-control">
            <option value="1" {{ isset($faq) && $faq->status ? 'selected' : '' }}>نشط</option>
            <option value="0" {{ isset($faq) && !$faq->status ? 'selected' : '' }}>مخفي</option>
        </select>
    </div>
</form>
