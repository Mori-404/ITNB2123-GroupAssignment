<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>By The Way Cafe | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .hero-banner {
            background-color: #FFFACD;
            padding: 40px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .hero-banner img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        .hero-text h1 {
            margin: 0 0 8px 0;
            font-size: 2.5rem;
        }

        .hero-text h2 {
            margin: 0 0 8px 0;
            font-size: 1.2rem;
        }

        .hero-text .tagline {
            margin: 0;
            font-size: 18px;
            font-style: italic;
            color: #d9381e;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="home.html">Home</a> | <a href="about.html">About</a> | <a href="menu.html">Menu</a> | <a href="promotion.html">Promotion</a> | <a href="catering.html">Catering</a> | <a href="gallery.html">Gallery</a> | <a href="review.html">Review</a> | <a href="careers.html">Careers</a> | <a href="faq.html">FAQ</a> | <a href="contact.html">Contact Us</a>
        </nav>
    </header>
    <main>
        <div class="hero-banner">
            <img src="media/logo.png" alt="By The Way Cafe Logo">
            <div class="hero-text">
                <h1>By The Way Cafe</h1>
                <p class="tagline">by the way, just be your own way</p>
            </div>
				<div class="status-widget">
                <div id="live-clock">--:--:--</div>
                <div id="shop-status">● Loading time...</div>
            </div>
        </div>

	<h2>Welcome to By The Way Cafe</h2>
        <p style="font-size: 1.1rem; color: #4E342E; margin-bottom: 25px;">
			Located in <strong>Simpang Ampat, Perlis</strong> | Open Daily: <strong>8:00 AM – 10:00 PM</strong>
		</p>
        <h2>Why Choose Us?</h2>
        <ul>
            <li><strong>Freshly Prepared Menu:</strong> Enjoy high-quality, made-to-order food and handcrafted beverages.</li>
            <li><strong>Affordable Prices:</strong> Delicious, budget-friendly options for everyone.</li>
            <li><strong>Cozy Ambience:</strong> The perfect space to gather with family and friends.</li>
			<li><strong>Fast & Reliable Service:</strong> Warm hospitality with quick service every time.</li>
        </ul>
    </main>
    <footer><p>&copy; 2026 By The Way Cafe. All Rights Reserved.</p></footer>
	<script src="script/clock.js"></script>
</body>
</html>
