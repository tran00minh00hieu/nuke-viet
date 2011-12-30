<!-- BEGIN: main -->
<!-- BEGIN: topic -->
<div class="box-border-shadow m-bottom listz-news">
    <div class="content-box">
        <!-- BEGIN: homethumb --><a href="{TOPIC.link}" title="{TOPIC.title}"><img class="s-border fl left" alt="{TOPIC.alt}" src="{TOPIC.src}" width="{TOPIC.width}"/></a><!-- END: homethumb --><h4><a href="{TOPIC.link}" title="{TOPIC.title}">{TOPIC.title}</a></h4>
        <p>
            <span class="time">{TIME}</span>
            | <span class="date">{DATE}</span>
        </p>
        <p>
            {TOPIC.hometext}
        </p>
        <!-- BEGIN: adminlink -->
        <p style="text-align : right;">
            {ADMINLINK}
        </p>
        <!-- END: adminlink -->
    </div>
    <div class="info">
        {LANG.pubtime}: {TIME} - {DATE}
    </div>
</div>
<!-- END: topic --><!-- BEGIN: other -->
<div class="other-news">
    <ul>
        <!-- BEGIN: loop -->
        <li>
            <a title="{TOPIC_OTHER.title}" href="{TOPIC_OTHER.link}">{TOPIC_OTHER.title}</a>
            <span class="date">({TOPIC_OTHER.publtime})</span>
        </li>
        <!-- END: loop -->
    </ul>
</div>
<!-- END: other -->
<!-- END: main -->
