    <?php $title = '搜尋洩漏紀錄';
        require 'src/header.php';
    ?>


    <header class="ts borderless extra padded massive center aligned fluid jumbotron">
        <h1 class="ts header"><?=$title?></h1>
    </header>

    <section class="ts narrow container">
        <h3 class="ts left aligned header">雜湊產生器</h3>
        <p>此方法可避免將個人資料直接回傳給我們<br>產生後請貼上到下方表單進行追蹤或搜尋<br>雜湊值產生方法為：<code>sha1(姓名+身分證後六碼)</code></p>
        <div class="ts negative message" id="missingkeyword1" style="display: none;">
            <div class="header">缺少姓名</div>
            <p>請輸入姓名</p>
        </div>
        <div class="ts negative message" id="missingkeyword2" style="display: none;">
            <div class="header">缺少身分證字號</div>
            <p>請輸入身分證字號後六碼</p>
        </div>
        <div class="ts positive message" id="hash_res" style="display: none;">
            <div class="header">雜湊代碼</div>
            <p id="real_res"></p>
        </div>
        <div class="ts very padded segment">
            <form class="ts form" onsubmit="gen_sha1(this); return false;">
                <div class="two fields">
                    <div class="field">
                        <label>姓名<span style="color:red;">*</span></label>
                        <input id="fullname" />
                    </div>
                    <div class="field">
                        <label>身分證字號後六碼<span style="color:red;">*</span></label>
                        <input id="nid" maxlength="6" />
                    </div>
                </div>
                <button class="ts primary button" type="submit">產生</button>
            </form>
        </div>
    </section>
    <section class="ts narrow container">
        <h3 class="ts left aligned header">搜尋表單</h3>
        <p>產生後請貼上到下方表單進行追蹤或搜尋</p>
        <div class="ts negative message" id="missingkeyword3" style="display: none;">
            <div class="header">缺少雜湊值</div>
            <p>請輸入雜湊代碼</p>
        </div>
        <div class="ts negative message" id="missingkeyword4" style="display: none;">
            <div class="header">輸入錯誤</div>
            <p>雜湊代碼格式錯誤</p>
        </div>
        <div class="ts negative message" id="backenderr" style="display: none;">
            <div class="header">後端錯誤</div>
            <p id="backenderr_text"></p>
        </div>
        <div class="ts negative message" id="breach" style="display: none;">
            <div class="header">真是太糟糕了</div>
            <p>發現個資洩漏情形<br>
            已發現項目：<ul id="breach_list"></ul></p>
            <p>
                <button class="ts button secondary right" onclick="window.location='subscribe.php';">訂閱外洩事件</button>
                <button class="ts button secondary right" onclick="window.location='breaches.php';">外洩事件列表&amp;解釋</button>
                <button class="ts button secondary right" onclick="window.location='faq.php#section1';">我應該怎麼做？</button>
            </p>
        </div>
        <div class="ts positive message" id="nobreach" style="display: none;">
            <div class="header">搜索完畢</div>
            <p>您的個資目前未在大規模洩漏中找到，不過可能只是未被本網站發現<br>再接再厲，繼續保持。</p>
            <p><button class="ts button secondary right" onclick="window.location='subscribe.php';">訂閱外洩事件</button></p>
        </div>
        <div class="ts very padded segment">
            <form class="ts form" onsubmit="search_func(this); return false;">
                <div class="one fields">
                    <div class="field">
                        <label>雜湊代碼<span style="color:red;">*</span></label>
                        <input id="hash" maxlength="40" />
                    </div>
                </div>
                <button class="ts primary button" type="submit" id="search">搜尋</button>
            </form>
        </div>
        <script src="https://www.google.com/recaptcha/api.js?render=<?=RECAPTCHA_SITE_KEY?>"></script>
        <script>const RECAPTCHA_SITE_KEY='<?= RECAPTCHA_SITE_KEY?>'</script>
        <script src="/js/main.js"></script>
    </section>

    <?php require 'src/footer.php'; ?>
