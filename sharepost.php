<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            
            
            <form method="post" action="dopostcomments.php">
        <input type="hidden" name="rhyme_id" value="<?php echo $rhyme_id; ?>"/>
        <div>            
        <textarea rows="5" cols="80" name="comments" id="comments" class="form-control rhyme-comment" placeholder="Write your views"></textarea>    
        </div>
        <div style="float:right; margin-top:15px;">
              <input type="submit" name="submit" value="POST">
               
        </div>          
    </form>   
    
<div class="share-icons">
        <a class="icon-facebook" href="" onclick="return fb_like()">Click here</a><a style="display: none;"
            class="icon-fb" href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=Azeem Akram Solangi&amp;p[url]=http://www.thefunkids.com/beta&amp;p[images][0]=http://www.yellowlite.com/images/yellowlite_logo.jpg&amp;p[summary]=I just used YellowLite's solar calculator, its great check it out"
            target="_blank"></a>
    </div>


 <script>

        function fb_like() {
            
            url = location.href;
           //var _content = "I just used YellowLite?'s Solar Calculator to see how I can save " + jQuery('.rhyme-comment').html() + "% a month on my tric //bill. See how much you can save by installing solar panels!";
            var _content = "I just used YellowLite?'s Solar Calculator to see how I can save ";

            //alert(_content);
            
            
            title = "The Fun Kids ";
            var url = jQuery('.icon-fb').attr('href')
                jQuery('.icon-fb').attr('href', url)
                setTimeout(function () {
                    window.open(jQuery('.icon-fb').attr('href'));
                }, 250);

        }

    </script>