<main>
    <section class="welcome">
        <h1>Welcome</h1>
        <p>Keep track of your games and wishlist.</p>
    </section>
    
    
    <section class="wishlist-preview">
        <h2>My List</h2>
        <div class="games-grid">
            <!-- Example wishlist thumbnail -->
            <div class="game">
                <img src="<?= base_url('assets/images/game_image.jpg') ?>" alt="Game Title">
                <p>Game Title</p>
            </div>
            <!-- Repeat for more wishlist games -->
        </div>
        <a href="<?= base_url('/collection') ?>" class="view-all">View All</a>
    </section>
</main>
