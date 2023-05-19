<footer>
    <svg class="waves" style="transform:rotate(180deg) ;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
        </g>
    </svg>
    <div class="">
        <h2>{{__('admin.INFORMATION TECHNOLOGY INCUBATOR')}}</h2>
        <ul>
            <li>
                <a href="#" class="nav-link text-white"  id="profile-link" target="_blank">
                    <i class="fab fa-facebook"></i> {{__('main.فيس بوك')}}
                </a>
            </li>
            <li>
                <a href="#"  class="nav-link text-white" target="_blank">
                    <i class="fab fa-instagram "></i> {{__('main.الانستغرام')}}
                </a>
            </li>
            <li>
                <a href="https://www.cis.edu.ps/arabic/"  class="nav-link text-white" target="_blank">
                    <i class="fa fa-heart"></i> {{__('main.موقع الكلية')}}
                </a>
            </li>
            <li>
                <a href="https://moodle.cis.edu.ps/login/index.php"  class="nav-link text-white" target="_blank">
                    <i class="fab fa-linkedin"></i> {{__('main.الموودل')}}
                </a>
            </li>
        </ul>
        <small>&copy; {{__('main.جميع الحقوق محفوضة -جامعة الازهر')}} -{{date('Y')}}</small>
    </div>
</footer>
