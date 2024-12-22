<div class="container instagram">
    <div class="row flex-eq-h nopadding">
        <div class="col-md-3 text-center nopadding">
            <div class="article-wrapper flex-md">
                <article class="bg-text">
                    <h6 class="h8">follow us</h6>
                    <div class="empty-space h15-xs"></div>
                    <p>on instagram</p>
                    <div class="empty-space h15-xs"></div>
                    <a href="#">&#35;mevo</a>
                </article>
            </div>
        </div>
        <div class="col-md-9 nopadding">
            @for ($i =1 ; $i<=10 ; $i++)
            <div><a href="#"><img src="{{asset('administrator/img/instagram-'.$i.'.jpg')}}" alt=""></a></div>
            @endfor
        </div>
    </div>
</div>