
<footer>

    <div class="footer">
        <div class="footer-box">
            <div class="footer-links">
                <div class="footer-links_media">
                    <h5>Почему SESTEAM</h5>
                    <ul>
                        <li>
                            <a href="{{MENU[26]['link']}}"><span>{{MENU[26]['name']}}</span></a>
                        </li>
                        <li>
                            <a href="{{MENU[27]['link']}}"><span>{{MENU[27]['name']}}</span></a>
                        </li>
                        {{--                        <li>
                                                    <a href="javascript:">Продажа Вашего Бизнеса</a>
                                                </li>--}}
                    </ul>
                </div>

                <div class="footer-links_socials">
                    <h5>Мы в соц.сетях</h5>
                    <ul>
                        <li>
                            <a rel="nofollow" href="javascript:" class="facebook" target="_blank">facebook</a>
                        </li>
                        <li>
                            <a rel="nofollow" href="javascript:" class="youtube" target="_blank">youtube</a>
                        </li>
                        <li>
                            <a rel="nofollow" href="javascript:" class="twitter" target="_blank">twitter</a>
                        </li>
                        <li>
                            <a rel="nofollow" href="javascript:" class="pinterest" target="_blank">pinterest</a>
                        </li>
                        <li>
                            <a rel="nofollow" href="javascript:" class="email" target="_blank">email</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-links_other">
                    <h5>Поддержка</h5>
                    <ul>
                        <li>
                            <a href="{{MENU[28]['link']}}"><span>{{MENU[28]['name']}}</span></a>
                        </li>
                        <li>
                            <a href="{{MENU[22]['link']}}"><span>{{MENU[22]['name']}}</span></a>
                        </li>
                        {{--                        <li>
                                                    <a href="javascript:">Часто задаваемые вопросы</a>
                                                </li>--}}
                    </ul>
                </div>
            </div>
            <div class="footer-copyrights">
                <p>© 2019 Ses Team</p>
            </div>
            <div class="footer-terms">
                <a href="javascript:">условия пользования</a>
                |
                <a href="javascript:">Политика конфедициальности</a>
                |
                <a href="javascript:">карта сайта
                </a>
            </div>
        </div>
    </div>
    <section class="modal">
        <div>
            <div class="modal-wrapper">
                <div class="modal-content">
                    <a href="javascript:;" class="modal-close"></a>
                    <div class="callback-form form">
                        <form action="javascript:" id="callback">
                            <input type="hidden" name="action" value="callback"/>
                            <input type="hidden" name="discount" value="без скидки">
                            <label><input type="hidden" name="page" value="{{request()->fullUrl()}}"/></label>
                            <label><input type="text" name="name" placeholder="Ваше имя"/></label>
                            <label><input type="tel" name="phone" placeholder="Ваш телефон"/></label>
                            <label><input type="submit" value="Отправить"/></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<script src="{{ asset('js/jq.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
