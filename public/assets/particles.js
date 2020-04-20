const particles = [];

function setup() {
  createCanvas(window.innerWidth, window.innerHeight);

  const particlesLength = Math.floor(window.innerWidth / 10);

  for (let i = 0; i < particlesLength; i++) {
    particles.push(new Particle());
  }
}

function draw() {
  background("#eae7e7");
  particles.forEach((p, index) => {
    p.update();
    p.draw();
    p.checkParticles(particles.slice(index));
  });
}

class Particle {
  constructor() {
    // Position
    this.pos = createVector(random(width), random(height));
    // Velocity
    this.vel = createVector(random(-1, 1), random(-1, 1));
    // Size
    this.size = 10;
  }

  // Update Movement by adding velocity
  update() {
    this.pos.add(this.vel);
    this.edges();
  }

  // Draw single particle
  draw() {
    noStroke();
    fill("#cfb495");
    circle(this.pos.x, this.pos.y, this.size);
  }

  // Detect edges
  edges() {
    // Edges for Left and Right
    if (this.pos.x < 0 || this.pos.x > width) {
      this.vel.x *= -1;
    }

    // Edges for top and bottom
    if (this.pos.y < 0 || this.pos.y > height) {
      this.vel.y *= -1;
    }
  }

  // Connect particles
  checkParticles(particles) {
    particles.forEach(particle => {
      const d = dist(this.pos.x, this.pos.y, particle.pos.x, particle.pos.y);

      if (d < 65) {
        stroke("#cfb495");
        line(this.pos.x, this.pos.y, particle.pos.x, particle.pos.y);
      }
    });
  }
}
