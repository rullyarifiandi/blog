<style>
    #id {
        display: block;
        transition: top 0.3s;
    }
</style>

<div id="backToTop" class="bg-rose-400 rounded-full text-center float-right cursor-pointer p-2 fixed right-5 bottom-5 dark:bg-lime-400 shadow-xl">
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current text-white dark:text-gray-900"><path d="M24 12c0 6.623-5.377 12-12 12s-12-5.377-12-12 5.377-12 12-12 12 5.377 12 12zm-1 0c0 6.071-4.929 11-11 11s-11-4.929-11-11 4.929-11 11-11 11 4.929 11 11zm-11.5-4.828l-3.763 4.608-.737-.679 5-6.101 5 6.112-.753.666-3.747-4.604v11.826h-1v-11.828z"/></svg>
</div>

<script>  
    window.onload = function(){ 
        document.getElementById("backToTop").style.bottom = "-50px";
    }

    window.onscroll = function() {  
        if (window.pageYOffset == 0) {
            document.getElementById("backToTop").style.bottom = "-50px";
        }else{
            document.getElementById("backToTop").style.bottom = "20px";
        } 
    }

    {
        const back2Top = document.querySelector('#backToTop');
        back2Top.addEventListener('click', (e) => {
            e.preventDefault();
            window.scroll({ top:0, left:0, behavior: 'smooth'});
        });
    }
</script>