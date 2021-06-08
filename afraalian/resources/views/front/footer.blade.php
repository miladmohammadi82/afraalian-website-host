<!-- Start Footer -->
<div class="footer">
    <div class="container">
        <div class="items-main-footer">
            <section class="item1">
                <p>مطالب پربازدید</p>
                <ul>
                    @foreach ($articlesPorbazdid as $articlePorbazdid)
                        <li>
                            <a href="{{ route('article.show.page', $articlePorbazdid->slug) }}">
                                <i class="fal fa-chevron-left"></i>
                                {{ $articlePorbazdid->name }}
                            </a>
                        </li>
                    @endforeach


                </ul>
            </section>


            <section class="item2">
                <p>باما همراه شوید</p>
                <ul>
                    <li>
                        <a href="" >
                            <i class="fal fa-chevron-left"></i>
                            تماس باما
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <i class="fal fa-chevron-left"></i>
                            درباره ما
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <i class="fal fa-chevron-left"></i>
                            پشتیبانی
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fal fa-chevron-left"></i>
                            وبلاگ
                        </a>
                    </li>
                </ul>
            </section>

            <section class="namads">
                <p>نماد ها</p>
                {{-- <ul>
                    <li>
                        <a href="" >
                            <img src="../assets/logo1.png" class="w-75" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="../assets/logo2.png" class="w-75" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="../assets/nashr.png" class="w-75" alt="">
                        </a>
                    </li>
                </ul> --}}
            </section>
        </div>


        <!-- Start footer for mobile -->


        <section class="footer-drop-down">
            <div class="menu-doropdon" @click="activeDrop1=!activeDrop1">
                <div class="title-drop-name">مطالب پربازدید</div>
                <i :class="{ 'far fa-plus':!activeDrop1,'far fa-minus':activeDrop1 }"></i>
            </div>

            <div class="dropdown-footer" v-if="activeDrop1">
                <ul class="menu-items">
                    @foreach ($articlesPorbazdid as $articlePorbazdid)
                        <li><a href="{{ route('article.show.page', $articlePorbazdid->slug) }}">{{ $articlePorbazdid->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="menu-doropdon" @click="activeDrop2=!activeDrop2">
                <div class="title-drop-name">باما همراه شوید</div>
                <i :class="{ 'far fa-plus':!activeDrop2,'far fa-minus':activeDrop2 }"></i>
            </div>
            <div class="dropdown-footer" v-if="activeDrop2">
                <ul class="menu-items">
                    <li><a href="#">تماس باما</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">پشتیبانی</a></li>
                    <li><a href="#">وبلاگ</a></li>
                </ul>
            </div>

            <section class="namads pt-5">
                <p>نماد ها</p>
                <ul>
                    <li>
                        <a href="" >
                            <img src="../assets/logo1.png" class="w-75" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="../assets/logo2.png" class="w-75" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="../assets/nashr.png" class="w-75" alt="">
                        </a>
                    </li>
                </ul>
            </section>


        </section>


        <!-- END footer for mobile -->

    </div>
</div>
<div class="copy-right-footer">

    <div class="items-copy-right-footer">
        <div class="container">
            <div class="copy-right-title">
                <small>&copy;  تمامی حقوق این وبسایت متعلق به شرکت چهل گیاه  است</small>
            </div>
            <div class="pm-resans">
                <ul class="social-network">
                    <li class="telegram-plane"><a href="#"><i class="fab fa-telegram-plane fa-lg"></i></a></li>
                    <li class="instagram"><a href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
                    <li class="youtube"><a href="#"><i class="fab fa-youtube fa-lg"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                    <li class="facebook-square"><a href="#"><i class="fab fa-facebook-square fa-lg"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Footer -->
</div>

<script src="{{ asset("js/app.js") }}" type="application/javascript"></script>

<script>
    new Vue({
        el: "#app",
        data: {
            menuOpen: false,
            mobileMenu: false,

            searchBox: false,
            showIgron: false,

            natayejSearch: false,
            showDropdownMobile: false,
            editIconDropdown: false,
            showMenuUser: false,
            showIgroneUser: false,
            openMenuUser:false,

            isLoggedIn: false,
            activetab: 1,


            // footer
            activeDrop1: false,
            activeDrop2: false,
            activeDrop3: false,
            countProductInProductPageForAddToCart: 1,

            productCarts:[
                { image:"عکس", title: "عسل کاکوتی ممتاز 400 گرمی", priceVahed: "150,000 تومان", priceMajmoh: "150,000 تومان" },
                { image:"عکس", title: "عسل کاکوتی ممتاز 400 گرمی", priceVahed: "150,000 تومان", priceMajmoh: "150,000 تومان" },
            ],
            // edit profile Users Informaation
            showAlertEditProfileInformation: false,

        },
        methods: {
            AddCountProductInProductPageForAddToCart(){
                this.countProductInProductPageForAddToCart++
                if (this.countProductInProductPageForAddToCart > 10) {
                    this.countProductInProductPageForAddToCart = 10
                }
            },
            RemoveCountProductInProductPageForAddToCart(){
                this.countProductInProductPageForAddToCart--
                if (this.countProductInProductPageForAddToCart < 1) {
                    this.countProductInProductPageForAddToCart = 1
                }
            },
            menuOpenshow(){
                if(!this.mobileMenu){
                    this.mobileMenu = true;
                }else{
                    this.mobileMenu = false;
                }

                if(!this.menuOpen){
                    this.menuOpen = true;
                }else{
                    this.menuOpen = false;
                }


                if (this.menuOpen) {
                    this.showIgron = true
                }else{
                    this.showIgron = false
                }


                if (this.menuOpen &&  this.mobileMenu) {
                    this.showMenuUser = false;
                    this.showIgroneUser = false;
                    this.openMenuUser = false;
                }
            },

            showDropdownMethod(){
                if(!this.showDropdownMobile){
                    this.showDropdownMobile = true;
                }else{
                    this.showDropdownMobile = false;
                }

                if (!this.editIconDropdown) {
                    this.editIconDropdown = true
                }else{
                    this.editIconDropdown = false
                }
            },

            addSearchBox(){
                if(!this.searchBox){
                    this.searchBox = true;
                }
                else{
                    this.searchBox = false;
                }
            },

            showUserMenu(){
                if(!this.showMenuUser){
                    this.showMenuUser = true;
                    this.showIgroneUser = true;
                }else{
                    this.showMenuUser = false;
                    this.showIgroneUser = false;
                }


                if (!this.openMenuUser) {
                    this.openMenuUser = true
                }else{
                    this.openMenuUser = false
                }


                if (this.showMenuUser &&  this.showIgroneUser) {
                    this.menuOpen = false;
                    this.mobileMenu = false;
                    this.showIgron = false

                }


            },


        },

        mounted () {
            // let sideBar = document.querySelector(".faraiand-pay");
            // let stickySideBar = sideBar.offsetTop;

            let header = document.querySelector("header");
            let sticky = header.offsetTop;
            window.onscroll = ()=> {

                // if (window.pageYOffset > stickySideBar) {
                //     sideBar.classList.add("sticky-sidebar");
                // }
                // else {
                //     sideBar.classList.remove("sticky-sidebar");
                // }
                if (window.pageYOffset > 200) {
                    if (window.pageYOffset > sticky) {
                        header.classList.add("sticky");
                    }


                }
                else {
                    header.classList.remove("sticky");
                }

            }



        },

    })

    var swiper = new Swiper('.swiper-container', {
    spaceBetween: 30,
    effect: 'fade',
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


</script>
@stack('styles')

@stack('scripts')
@stack('checkoutPageScripts')

</body>
</html>
