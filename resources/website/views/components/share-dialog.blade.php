<section>
    {{-- <div class="share-overlay"></div>
    <div class="share-body">
        12
    </div> --}}
    <div class="share-dialog" x-data="shareDialog">
        <div class="share-dialog-content">
            <header>
                <span>Share this with socials:</span>
                <div class="close">
                    <button onclick="closeModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
            </header>
            <div class="content">
                <p>All social meidas:</p>
                <div class="iconss">
                    
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="facebook share-social"
                        onclick="window.open(this.href, 'share-facebook','left=50,top=50,width=600,height=320,toolbar=0'); return false;">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> --}}
                            {{-- <small>Share to</small> --}}
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="https://telegram.me/share/url?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="telegram share-social"
                    onclick="window.open(this.href, 'share-telegram','left=50,top=50,width=600,height=320,toolbar=0'); return false;">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> --}}
                            {{-- <small>Share to</small> --}}
                            <i class="fab fa-telegram-plane" aria-hidden="true"></i>
                    </a>
                     {{-- <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a> --}}
                   
                </div>
                <p>Or copy the link</p>
                <div class="field">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    <input type="text" id="share-link" readonly="" value="example.com/share-link">
                    <button class="copy">Copy</button>
                </div>
            </div>
        </div>
    </div>
    <div class="share-dialog-overlay"></div>
</section>
