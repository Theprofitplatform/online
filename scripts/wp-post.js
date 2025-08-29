import fetch from "node-fetch";

const { WP_URL, WP_USER, WP_APP_PASSWORD } = process.env;

async function wp(path, opts={}) {
  const auth = Buffer.from(`${WP_USER}:${WP_APP_PASSWORD}`).toString("base64");
  const res = await fetch(`${WP_URL}${path}`, {
    headers: { 
      "Authorization": `Basic ${auth}`, 
      "Content-Type": "application/json" 
    },
    ...opts
  });
  if (!res.ok) throw new Error(`${res.status} ${await res.text()}`);
  return res.json();
}

const payload = {
  title: "Instant Car Offer",
  status: "publish",
  content: "<h1>Instant Car Offer</h1><p>SEO body…</p>",
  slug: "instant-car-offer"
};

const run = async () => {
  const existing = await wp(`/wp-json/wp/v2/pages?slug=${payload.slug}`);
  if (existing.length) {
    await wp(`/wp-json/wp/v2/pages/${existing[0].id}`, { 
      method: "POST", 
      body: JSON.stringify(payload) 
    });
    console.log("Updated page");
  } else {
    await wp(`/wp-json/wp/v2/pages`, { 
      method: "POST", 
      body: JSON.stringify(payload) 
    });
    console.log("Created page");
  }
};

// Export for use by other modules
export { wp, run };

// Run if called directly
if (import.meta.url === `file://${process.argv[1]}`) {
  run().catch(e => { 
    console.error(e); 
    process.exit(1); 
  });
}