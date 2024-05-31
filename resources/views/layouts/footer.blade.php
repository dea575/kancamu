<style>
    .center-top {
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    .center-bottom {
        position: absolute;
        top: 58%;
        left: 45%;
        transform: translate(-50%, -50%);

    }

    .bottom-left {
        position: absolute;
        top: 36%;
        left: 20%;
    }

    .bottom-right {
        position: absolute;
        top: 35%;
        left: 55%;
    }
</style>
<footer>
    <div class="verdana-regular" style="position: relative;">
        <img src="{{ asset('asset/background-footer.svg') }}" alt="" class="img-fluid w-100 h-100">
        <div class="center-top">
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
        <div class="bottom-left">
            <div class="col-4">
                <p style="font-size: 12px">Pemata Saxofone, Blok G9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65143</p>
                <div class="d-flex gap-1 mt-3">
                    <a href="https://www.instagram.com/kancamu.co?igsh=MjNmYzh3ZjE3dXNr" target="__blank"><img src="{{ asset('asset/footer/instagram.png') }}" alt="" class="img-fluid" style="max-width: 16px; max-height: 16px;"></a>
                    <a href="https://www.linkedin.com/company/kancamu/" target="__blank"><img src="{{ asset('asset/footer/linkedin.png') }}" alt="" class="img-fluid" style="max-width: 16px; max-height: 16px;"></a>
                    <a href="https://wa.me/6282228679118" target="__blank"><img src="{{ asset('asset/footer/whatsapp.png') }}" alt="" class="img-fluid" style="max-width: 16px; max-height: 16px;"></a>
                    <a href="https://maps.app.goo.gl/PHpugGF1rbwAif777" target="__blank"><img src="{{ asset('asset/footer/google_maps.png') }}" alt="" class="img-fluid" style="max-width: 16px; max-height: 16px;"></a>
                </div>
            </div>
        </div>
        <div class="center-bottom">
            <div style="font-size: 12px">
                <b>Tautan</b><br>
                <p><a href="{{ route('dashboard') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Beranda</a></p>
                <p><a href="{{ route('depression') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Tentang Depresi</a></p>
                <p><a href="{{ route('test.index') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Tes</a></p>
                <p><a href="{{ route('mood.index') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Mood Harian</a></p>
                <p><a href="{{ route('about-us') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Tentang Kami</a></p>
            </div>
        </div>
        <div class="bottom-right">
            <b style="font-size: 12px">Nilai Perusahaan</b>
            <div style="font-size: 11px" class="col-5">
                <p>Kancamu diadopsi dari Bahasa Jawa yang berarti
                    ‘temanmu’.Hal ini selaras dengan nilai
                    kami, yakni: ajak lebih sehat, cegah lebih tepat, tangani lebih tepat.</p>
            </div>
        </div>
    </div>
</footer>
