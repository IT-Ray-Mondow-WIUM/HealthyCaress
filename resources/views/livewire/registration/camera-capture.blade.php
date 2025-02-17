<div>
    <div class="row">
        <!-- Kolom Kamera -->
        <div class="col-md-6 text-center border border-dark">
            <small>Take Picture</small>
            <div x-data="{ 
                capture() { 
                    let canvas = this.$refs.canvas; 
                    let video = this.$refs.video; 
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height); 
                    this.saveImage(canvas.toDataURL('image/png'));
                },
                saveImage(dataUrl) {
                    fetch(dataUrl)
                        .then(res => res.blob())
                        .then(blob => {
                            let file = new File([blob], 'photo.png', { type: 'image/png' });
                            @this.upload('photo', file, (uploadedFilename) => {
                                console.log('Photo uploaded:', uploadedFilename);
                                @this.dispatch('photoCaptured', uploadedFilename);
                            }, (error) => {
                                console.error('Upload failed:', error);
                            });
                        });
                }
            }" x-init="
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(stream => { $refs.video.srcObject = stream; })
                    .catch(error => alert('Gagal mengakses kamera'));
            ">

                <video x-ref="video" class=" border rounded" autoplay playsinline
                    style="max-width: 75%; height:325px;"></video>
                <canvas x-ref="canvas" class="d-none"></canvas>
                <div>
                    <button @click="capture" class="btn btn-success my-2">Ambil Foto</button>
                </div>
            </div>
        </div>

        <!-- Kolom Hasil Foto -->
        <div class="col-md-6 text-center border border-dark">
            <small>Preview</small>
            <div>
                @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" style="max-width: 75%; height:325px;">
                @else
                <img src="{{ asset('images/people.jpg') }}" class="img-thumbnail" style="max-width: 75%; height:325px;">
                @endif
            </div>
        </div>
    </div>
    <!-- Notifikasi -->
    @if (session()->has('message'))
    <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>