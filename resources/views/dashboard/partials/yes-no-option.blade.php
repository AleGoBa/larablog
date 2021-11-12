@if (isset($post))
    @if ($post->posted == 'yes')
        <option value="not">No</option>
        <option selected value="yes">Si</option>
    @else
        <option selected value="not">No</option>
        <option value="yes">Si</option>
    @endif
@else
    <option selected value="not">No</option>
    <option value="yes">Si</option>
@endif
