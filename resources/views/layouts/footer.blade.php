<footer>
    <style>
        .footer-bg {
            position: relative;
            background: url('{{ asset('asset/background-footer.svg') }}') no-repeat center center;
            background-size: cover;
            color: #333;
        }

        .footer-logo img {
            height: 49px;
        }

        .footer-content {
            padding: 10px 0;
        }

        .social-icons img {
            max-width: 16px;
            max-height: 16px;
            margin-right: 8px;
        }

        .footer-links a {
            display: block;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .footer-logo {
                text-align: center;
            }

            .social-icons {
                justify-content: center;
            }

            .footer-links, .footer-address, .footer-values {
                text-align: center;
            }
        }
    </style>
    <div class="footer-bg">
        <div class="container footer-content">
            <div class="row justify-content-center">
                <div class="col-12 footer-logo mb-0">
                    <div class="text-center">
                        <img src="{{ asset('asset/logo.png') }}" alt="Logo">
                    </div>
                </div>
                <div class="col-12 col-md-0 footer-address mb-4 mb-md-0">
                    <div class="text-center text-md-center">
                        <p style="font-size: 12px">Pemata Saxofone, Blok G9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65143</p>
                        <div class="d-flex justify-content-center social-icons">
                            <a href="https://www.instagram.com/kancamu.co?igsh=MjNmYzh3ZjE3dXNr" target="__blank"><img src="{{ asset('asset/footer/instagram.png') }}" alt="Instagram"></a>
                            <a href="https://www.linkedin.com/company/kancamu/" target="__blank"><img src="{{ asset('asset/footer/linkedin.png') }}" alt="LinkedIn"></a>
                            <a href="https://wa.me/6282228679118" target="__blank"><img src="{{ asset('asset/footer/whatsapp.png') }}" alt="WhatsApp"></a>
                            <a href="https://maps.app.goo.gl/PHpugGF1rbwAif777" target="__blank"><img src="{{ asset('asset/footer/google_maps.png') }}" alt="Google Maps"></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-0 footer-links mb-4 mb-md-0">
                    <div class="text-center text-md-left">
                        <b>Tautan</b>
                        <a href="{{ route('dashboard') }}" class="link-dark">Beranda</a>
                        <a href="{{ route('depression') }}" class="link-dark">Tentang Depresi</a>
                        <a href="{{ route('test.index') }}" class="link-dark">Tes</a>
                        <a href="{{ route('mood.index') }}" class="link-dark">Mood Harian</a>
                        <a href="{{ route('about-us') }}" class="link-dark">Tentang Kami</a>
                    </div>
                </div>
                <div class="col-12 col-md-0 footer-values mb-4 mb-md-0">
                    <div class="text-center text-md-left">
                        <b style="font-size: 12px">Nilai Perusahaan</b>
                        <p style="font-size: 11px">Kancamu diadopsi dari Bahasa Jawa yang berarti ‘temanmu’. Hal ini selaras dengan nilai kami, yakni: ajak lebih sehat, cegah lebih tepat, tangani lebih tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>