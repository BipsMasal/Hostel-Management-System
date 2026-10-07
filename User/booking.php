<section class="rooms">
  <h2>Available Rooms</h2>

  <!-- Search and Filter Bar -->
  <div class="room-filter">
    <input type="text" id="searchRoom" placeholder="Search by room type...">
    <select id="roomTypeFilter">
      <option value="all">All Types</option>
      <option value="single">Single Room</option>
      <option value="double">Double Room</option>
      <option value="deluxe">Deluxe Room</option>
    </select>
  </div>

  <!-- Room Cards Grid -->
  <div class="room-grid" id="roomGrid">
    <div class="room-card" data-type="single">
      <img src="https://source.unsplash.com/400x250/?single-room" alt="Single Room">
      <div class="room-info">
        <h3>Single Room</h3>
        <p>Cozy single bed with attached bathroom and study table.</p>
        <div class="price">Rs. 6,000 / month</div>
        <button class="book-btn">Book Now</button>
      </div>
    </div>

    <div class="room-card" data-type="double">
      <img src="https://source.unsplash.com/400x250/?double-room" alt="Double Room">
      <div class="room-info">
        <h3>Double Room</h3>
        <p>Spacious double bed room ideal for friends or siblings.</p>
        <div class="price">Rs. 10,000 / month</div>
        <button class="book-btn">Book Now</button>
      </div>
    </div>

    <div class="room-card" data-type="deluxe">
      <img src="https://source.unsplash.com/400x250/?deluxe-room" alt="Deluxe Room">
      <div class="room-info">
        <h3>Deluxe Room</h3>
        <p>Premium amenities with balcony and personal workspace.</p>
        <div class="price">Rs. 15,000 / month</div>
        <button class="book-btn">Book Now</button>
      </div>
    </div>

    <div class="room-card" data-type="single">
      <img src="https://source.unsplash.com/400x250/?hostel-bed" alt="Single Room">
      <div class="room-info">
        <h3>Single Room (AC)</h3>
        <p>Single bed with air conditioning and wardrobe.</p>
        <div class="price">Rs. 8,000 / month</div>
        <button class="book-btn">Book Now</button>
      </div>
    </div>
  </div>
</section>
