import fetch from "node-fetch";

const url = process.env.CHECK_URL;

if (!url) {
  console.error("CHECK_URL environment variable is required");
  process.exit(1);
}

try {
  const res = await fetch(url, { redirect: "follow" });
  
  if (!res.ok) {
    console.error(`HTTP ${res.status}: ${res.statusText}`);
    process.exit(1);
  }
  
  const html = await res.text();
  
  // Check for WordPress indicators
  if (!html.includes("wp-content")) {
    console.error("WordPress wp-content not found in response");
    process.exit(1);
  }
  
  // Check for site-specific content
  if (!html.toLowerCase().includes("the profit platform")) {
    console.error("Site-specific content 'The Profit Platform' not found");
    process.exit(1);
  }
  
  console.log("Health check passed ✓");
  console.log(`Site is responding correctly at ${url}`);
  
} catch (error) {
  console.error("Health check failed:", error.message);
  process.exit(1);
}