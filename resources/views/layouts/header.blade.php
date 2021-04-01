<header class="l-header">
    <div class="l-header__content">
        <div class="l-header__inner">
            <div class="p-header__logo">
                <h1>
                    <a href="/" class="p-header__logo-link">にいがたサウナビ</a>
                </h1>
            </div>

            <div class="p-actionNav">
                <ul class="p-actionNav__links">
                    @guest
                    <li class="p-actionNav__link p-actionNav__link--button -login">
                        <a href="{{route('login')}}">ログイン</a>
                    </li>
                    <li class="p-actionNav__link p-actionNav__link--button -regi">
                        <a href="{{route('register')}}">新規登録</a>
                    </li>
                    @else
                    <li class="p-actionNav__link p-actionNav__link--button -login">
                        <a href="/users/show/{{Auth::user()->id}}">マイページ</a>
                    </li>
                    <li class="p-actionNav__link p-actionNav__link--button -regi">
                        <a href="{{route('logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>

            <div class="p-menuBtn" data-target="globalNav">
                <div class="p-menuBtn__content js-menuTarget">
                    <span class="p-menuBtn__line"></span>
                    <span class="p-menuBtn__line"></span>
                    <span class="p-menuBtn__line"></span>
                </div>
            </div>


            
            <!-- <div class="p-menu p-menu--globalNav"> -->
                <div class="p-menu__content">
                    <nav class="p-globalNav js-open-menu">
                   
                        <ul class="p-globalNav__links is-login">
                        @guest
                            <li class="p-globalNav__link p-globalNav__link--button -login">
                                <a href="{{route('login')}}">ログイン</a>
                            </li>
                            <li class="p-globalNav__link p-globalNav__link--button -regi">
                                <a href="{{route('register')}}">新規登録</a>
                            </li>
                            @else
                            <li class="p-actionNav__link p-actionNav__link--button -login">
                                <a href="/users/show/{{Auth::user()->id}}}">マイページ</a>
                            </li>
                            <li class="p-actionNav__link p-actionNav__link--button -regi">
                                <a href="{{route('logout')}}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                       

                        @guest
                        <ul class="p-globalNav__links js-open-menuTarget">
                            <li class="p-globalNav__link">
                                <a href="{{route('login')}}">にいがたサウナビとは？</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">初心者向け　サウナの楽しみ方</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">お問い合わせ</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">利用規約</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">プライバシーポリシー</a>
                            </li>
                        </ul>
                        @else
                        <ul class="p-globalNav__links js-open-menuTarget">
                            <li class="p-globalNav__link">
                                <a href="{{route('login')}}">にいがたサウナビとは？</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">初心者向け　サウナの楽しみ方</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="{{route('sauna.create')}}">施設新規登録</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="/users/withDrawal/{{Auth::user()->id}}">退会</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">お問い合わせ</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">利用規約</a>
                            </li>
                            <li class="p-globalNav__link">
                                <a href="">プライバシーポリシー</a>
                            </li>
                        </ul>
                        @endguest
                    </nav>
                </div>
            <!-- </div>  -->

        </div>
    </div>
</header>
