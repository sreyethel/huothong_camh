<div class="share-flex-content">
    <div class="share-flex-content-title">
        <h1>@lang('website.page.share_to_social_media')</h1>
    </div>
    <div class="share-flex-content-social">
        <div class="share-flex-content-social-item">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"
                onclick="window.open(this.href, 'share-facebook','left=50,top=50,width=600,height=320,toolbar=0'); return false;">
                <i data-feather="facebook"></i>
            </a>
        </div>
        <div class="share-flex-content-social-item">
            <a href="https://twitter.com/intent/tweet?text={{ urlencode(Request::fullUrl()) }}" target="_blank"
                onclick="window.open(this.href, 'share-facebook','left=50,top=50,width=600,height=320,toolbar=0'); return false;">
                <i data-feather="twitter"></i>
            </a>
        </div>
        <!--
        <div class="share-flex-content-social-item">
            <a href="https://t.me/share/url?text={{ urlencode(Request::fullUrl()) }}" target="_blank"
                onclick="window.open(this.href, 'share-facebook','left=50,top=50,width=600,height=320,toolbar=0'); return false;">
                <i class="fab fa-telegram"></i>
            </a>
        </div>
        -->
    </div>
</div>
