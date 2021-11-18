<pre>
======= FRONT-END =======
- Multi-language
- Multi-currency
- Multi-address
- Shopping cart
- Customer login
- Product attributes: cost price, promotion price, stock, tax..
- CMS content: category, news, content, web page
- Plugin: Shipping, payment, Discount, Total, Multiple vendor...
- Upload manager: banner, images,..
- SEO support: custome URL
- API module
- Support library plugin, template online
...

======= ADMIN =======

- Admin roles, permission
- Product manager
- Order management
- Customer management
- Template manager
- Plugin manager
- Store manager
- System config: email setting, info shop, maintain status,...
- Backup, restore data
- Report: chart, statistics, export csv, pdf...
...

</pre>

## Technology
- Core <a href="https://laravel.com">Laravel Framework</a>

## Requirements:

From Version 5.0

> Core laravel framework 8.x Requirements::

```
- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
```

## Installation & configuration:


**From github**

**Step1: Setup install eviroment**

<p> - Cài đặt xampp (hoặc warmpp,...)</p>
<p> - Cài đặt composer (<a href="https://getcomposer.org/Composer-Setup.exe">Link</a>)</p>
<p> - Trong khi cài đặt composer, trỏ đường dần php về file php.exe của xampp (hoặc warmpp,...)</p>
<p> - Clone code trên github về máy</p>
<p> - Cho code vào thư mục htdocs của xampp (hoặc warmpp)</p>

**Step2:**
<p> - Vào trong thư mục của project</p>
<p> - Mở cmd</p>
<p> - Gõ lệnh: <i>composer install</i></p>
<p> - Gõ lệnh: <i>cp .env.example .env</i></p>
<p> - Gõ lệnh: <i>php artisan key:generate</i></p>

**Step3: Create database**

<p>`Tạo database , sau đó import file .sql  trong thư mục database hoặc /vendor/../...sql vào database<p>

**Step4: Config**
<pre>
<p> - Mở file <span style="color: red">.evn</span> trong project</p>
APP_DEBUG=false (Sét giá trị là false để bảo vệ thông tin website)
DB_HOST=127.0.0.1 (Địa chỉ server database)
DB_PORT=3306 (Port của database)
DB_DATABASE=ecommerce (Tên dữ liệu của bạn)
DB_USERNAME=root (Tên người dùng kết nối dữ liệu)
DB_PASSWORD= (Mật khẩu người dùng dữ liệu)
APP_URL=http://localhost (đây là url website của bạn)
</pre>

**Step5: Run program**
<p> - Gõ lệnh : <i>php artisan serve</i> để chạy project</p>
<hr>
<p>Tài khoản / Mật khẩu admin: admin / admin</p>
