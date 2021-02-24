const puppeteer = require('puppeteer');

async function main() {
  const browser = await puppeteer.launch({headless: true});
  const page = await browser.newPage();
  await page.setViewport({width: 1200, height: 720});
  await page.goto('http://wordpressx.local/wp-login.php', { waitUntil: 'networkidle0' }); // wait until page load
  await page.type('#user_login', "wordpressx");
  await page.type('#user_pass', "E|gqp*|guPH3");
  await page.click('#wp-submit');
  await delay(5000);
  await page.click(".menu-icon-post");
  await delay(1000);
  await page.click(".page-title-action");
  await delay(1000);
  await Promise.all([
    page.screenshot({ path: "example.png" }),
  ]);
  await browser.close();
}

function delay(time) {
  return new Promise(function(resolve) { 
      setTimeout(resolve, time)
  });
} 

main();