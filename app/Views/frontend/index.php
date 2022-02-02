<?= $this->extend('App\Views\Auth\layout') ?>
<?= $this->section('main') ?>
<div class="container">
         <center>
            <h1 style="color:red;">SSNIC Blood Warrior's </h1>
            <div id="containerBlood">
               <div class="pour"></div>
               <div class="pourTube"></div>
               <div id="beaker">
                  <div class="beer-foam">
                  </div>
                  <div id="plastic">
                  </div>
                  <div class="drop firstDrop"></div>
                  <div class="drop secondDrop"></div>
                  <div class="drop thirdDrop"></div>
                  <div id="liquid">
                     <div class="bubble bubble1"></div>
                     <div class="bubble bubble2"></div>
                     <div class="bubble bubble3"></div>
                     <div class="bubble bubble4"></div>
                     <div class="bubble bubble5"></div>
                  </div>
               </div>
            </div>
            <p>একজন রক্তযোদ্ধা হোন আপনিও। রক্তদান কার্যক্রম আরো সহজ করতে আপনার অংশগ্রহন জরুরি। </p>
            <?php if (service('authentication')->check()) { ?>
            <a href="<?= route_to('dashboard') ?>" ><button style="color:#fff; background-color:red; padding: 20px; border-radius:25px;  "> Go to profile </button> </a>
            <?php } else { ?>
            <a href="register" ><button style="color:#fff; background-color:red; padding: 20px; border-radius:25px;  "> ডোনার হিসেবে যুক্ত হোন </button> </a>
            <?php } ?>
            <h1 id="isPasted">কেন আপনার তথ্য নিচ্ছি,</h1>
            <p>
               আপনার তথ্য নিয়ে তৈরি হবে আমাদের ডাটাবেজ, আর দ্রুততম হবে রক্তদান প্রক্রিয়া।  তাই রক্তদান প্রক্রিয়াকে নিরাপদ ও সহজ করতে যোগ দিন এখনই। <br> <b>এছাড়াও,
               </b>
            </p>
            <p>১। আপনার তথ্য শুধুমাত্র জরুরি ক্ষেত্রে ব্যবহার করা হবে ।</p>
            <p>২। কোন তৃতীয় পক্ষের নিকট আপনার তথ্য বিক্রি বা প্রদান করা হবে না।</p>
            <p>৩। আপনার তথ্যের সম্পূর্ণ নিরাপত্তা দিতে আমরা বদ্ধ পরিকর।</p>
            <p>
               <br>
            </p>
         </center>
      </div>
<?= $this->endSection() ?> 