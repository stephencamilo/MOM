const puppeteer = require('puppeteer');

async function main() {
  const browser = await puppeteer.launch({headless: true});
  const page = await browser.newPage();
  await page.setViewport({width: 1200, height: 720});
  await page.goto('http://wordpressx.local/wp-login.php', { waitUntil: 'networkidle0' }); // wait until page load
  await page.type('#user_login', "wordpressx");
  await page.type('#user_pass', "E|gqp*|guPH3");
  await page.click('#wp-submit')
  // click and wait for navigation
  await Promise.all([
    page.screenshot({ path: 'example.png' })
  ]);
}

main();