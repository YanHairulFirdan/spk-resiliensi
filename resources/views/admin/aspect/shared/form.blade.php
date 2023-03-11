<form class="form" method="POST"  action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @method($type)
  <div class="form-group">
      <label for="aspec">Aspek</label>
      <input type="text" id="aspect" class="form-control" name="aspect"
          value="{{ old('aspect', $aspect->aspect) }}">
      @error('aspect')
          <div class="bg-danger text-white p-2">
              {{ $message }}
          </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="aspec">Deskripsi</label>
      <textarea class="form-control" name="descriptions">{{ old('descriptions', $aspect->descriptions) }}</textarea>
      @error('descriptions')
          <div class="bg-danger text-white p-2">
              {{ $message }}
          </div>
      @enderror
  </div>
  <div class="form-group">
      <label for="aspec">Pesan</label>
      <textarea name="quote" class="form-control">{{ old('quote', $aspect->quote) }}</textarea>
      @error('quote')
          <div class="bg-danger text-white p-2">
              {{ $message }}
          </div>
      @enderror
  </div>
  <div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="aspec">Gambar</label>
            <input type="file" name="image" accept="jpg,png">
            @error('quote')
                <div class="bg-danger text-white p-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <img class="w-50" src="{{ $aspect->getImagePath() }}" alt="{{ $aspect->aspect }}">
    </div>
  </div>
  <button type="submit" class="btn btn-large btn-primary">{{ $buttonText }}</button>
</form>