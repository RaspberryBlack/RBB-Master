!function($){$(document).ready(function(){$(".alert .close").click(function(t){t.preventDefault(),$(this).parent().fadeOut("slow")}),$('input[type="text"],input[type="email"]').focus(function(){this.value===this.defaultValue&&(this.value="")}).blur(function(){this.value.length||(this.value=this.defaultValue)}),$(".lexicon-term").click(function(t){t.preventDefault()}).each(function(){var t=$(this).attr("href"),e=$(this).text();$(this).qtip({show:{event:"click mouseenter"},hide:{delay:1e3,fixed:!0},position:{my:"bottom center",at:"top center",viewport:$(".page"),adjust:{method:"shift"}},content:{title:'<a href="'+t+'">'+e+" » </a>"}})})})}(jQuery);