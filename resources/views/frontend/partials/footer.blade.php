<footer>
    <div class="footer__news_letter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="footer__news_letter__title">
                        <span>{{$themes->slogan}}</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="footer__news_letter__text">
                        <span>{!!$themes->subfooter!!}</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="footer__news_letter__form">
                        <div class="footer__news_letter__form__input">
                            <input type="text" placeholder="Ihre E-Mail-Adresse">
                        </div>
                        <div class="footer__news_letter__form__button">
                            <button type="submit" class="btn btn-light">
                                <span title="Breathwell-Natural Newsletter">Send mail</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__information">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="footer__information__item">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="footer__information__item__title">
                                <span>Social link</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            @foreach ($social as $item)
                            <a href="{{$item->link}}">{!!$item->social!!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($footer as $item)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="footer__information__item">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="footer__information__item__title">
                                <span>{{$item->header}}</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            {!!$item->content!!}
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($categoriesfooter->where('submenu2',1) as $categoryfooter)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="footer__information__item">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="footer__information__item__title">
                                    <span>{{$categoryfooter->category}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                @foreach ($categoriesfooter->where('category_id',$categoryfooter->id) as $item)
                                <div>
                                    <a href="#"><span>{{$item->category}}</span></a>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="footer__information__item">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="footer__information__item__title">
                                <span>breathwell-natural</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="select_triumph_global">
                                <select class="triumph_global">
                                    <option value="#">Deautschland</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy_right">
        <div class="container">
            <div class="footer__copy_right__content">
                <span>Copyright 2020 - Breathwell-Natural Sales AG. All rights reserved</span>
            </div>
        </div>
    </div>
    </div>
</footer>
