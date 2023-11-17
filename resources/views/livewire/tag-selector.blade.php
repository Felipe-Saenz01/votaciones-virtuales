<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{-- {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }} --}}
    <div class="mb-3">
        <x-label for="tags" value="{{ __('Tags') }}" />
        <x-select id="tags" class="block mt-1 w-full" name="tags[]" multiple required>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectSufragante) ? 'selected' : '' }}>
                    {{ $tag->nombre }}
                </option>
            @endforeach
        </x-select>  
    </div>

    {{$sufraganteEdit}}
    <script>
        $(document).ready(function(){
            $('#tags').select2();
        })
    </script>

</div>
