# Bağış Websitesi 

Bu proje bana Web Tabanlı Programlama dersi kapsamında verilmiştir. Bu projede bizden PHP, MySQL ve HTML kullanılarak bir websitesi tasarlamamız istenmiştir. Tasarlanan web sitesinde elde edilen verilerin saklanması, bu verilerin çekilmesi, düzenlenmesi ve silinmesi işlemlerini barındırmaktadır. 

Tasarlanan websitesine [linke](http://donationwebsite.great-site.net/) tıklayarak ulaşabilirsiniz.

## Proje Tanıtımı

Ana sayfada kullanıcı ve yetkili için giriş yapma, ve sadece kullanıcı için kayıt olma butonları bulunmaktadır. Yetkililer için de kayıt olma formu bulunmaktadır ancak ana sayfaya eklenmemiştir. Bunun sebebi ziyaretçilerin kolayca yetkili hesabı açıp verileri kontrol etmesini engellemektir. 

![Ekran görüntüsü 2023-05-23 203317](https://github.com/sumeyyedrl/PHP_MySQL_Project/assets/92041818/871c7906-bb35-47b1-8951-e267b3d583f5)

Yetkili kaydı oluşturmak için ise buradaki [linkten](http://donationwebsite.great-site.net/author_signup.php) yararlanabilirsiniz.
Yetkililer bütün kullanıcıları ve yapılan bütün bağışları görüntüleyebilmektedir. Aynı zamanda bağış yapılan kurumları düzenleyebilir, silebilir ve yeni kurum ekleyebilirler.

![Ekran görüntüsü 2023-05-23 203459](https://github.com/sumeyyedrl/PHP_MySQL_Project/assets/92041818/5b9b0cdf-b546-4864-9036-9e2f37dab127)

Kullanıcılar ise kayıt olup giriş yaptıktan sonra bağış yapılabilecek kurumları görüntülerler. Bağış yapmak istedikleri kurumu seçip bağışlarını tamamladıktan sonra bağış geçmişinde daha önceden yaptıkları bağışlar da dahil olmak üzere tüm bağışları gözlemleyebilirler.

![Ekran görüntüsü 2023-05-23 203535](https://github.com/sumeyyedrl/PHP_MySQL_Project/assets/92041818/ba6ea032-ec5f-40e0-a29c-902ba61e7f73)

Proje ile ilgili detaylı youtube tanıtım videosuna [buradan](https://youtu.be/OlOrQ_3kKy4) ulaşabilirsiniz! 

### Gereklilikler

Websitesini tecrübe etmeye [buradan](http://donationwebsite.great-site.net/) başlayabilirsiniz. Ayrıca yetkili erişimine sahip olmak için [buradan](http://donationwebsite.great-site.net/author_signup.php) kayıt oluşturabilirsiniz. 

Projeyi kendi bilgisayarınızda deneyimlemek istiyorsanız şu adımları izlemelisiniz;
- XAMPP isimli yerel sunucu sağlayan uygulamayı indirip kurmalısınız. Buradaki [linkten](https://www.apachefriends.org/tr/index.html) uygulamayı indirebilirsiniz.
- Projenin bütün dosyalarını XAMPP uygulamasının kurulduğu dosyadaki htdocs isimli doyaya yüklemelisiniz.
- Uygulamayı açıp Apache ve MySQL modüllerini çalışır hale getirmelisiniz. Port çakışması gibi durumlarda bu modüller çalışamayacakır ve uygulama uyarı verecektir. Bu gibi durumlara dikkat edin ve config butonuyla gerekli ayarları yapın.
- Apache modülünün çalıştığı portu localhost:... şeklinde ifadenin sonuna ekleyin ve tarayıcınızda aratın.
- Ana sayfaya ulaşmış olacaksınız.

Veri tabanı gerekli ayarlamaları yapmak için ise şu adımları izlemelisiniz;
- Ana sayfaya ulaştığınızda adres çubuğundaki 'index.html' ifadesini silip 'phpmyadmin' ifadesini eklemelisiniz. 
- Açılan sayfanın üst kısmında SQL ifadesine tıklayıp mysql.sql isimli dosyanın içindeki kodu oraya yapıştırın ve çalıştırın.
- Ardından mysql.php isimli dosyada ilgili değişkenlere şu değişiklikleri uygulayın;

        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_name="donation";
 
 - Tebrikler! Projeyi kendi bilgisayarınızda test etmeye hazırsınız!

## Kullanılan Programlar ve Diller

- [VSCode](https://code.visualstudio.com/) : Editör olarak kullanılmıştır.
- [XAMPP](https://www.apachefriends.org/tr/index.html) : Proje geliştirilirken sanal sunucu sağlamada kullanılmıştır.
- [Bulma](https://bulma.io/) : Websitesinin tasarımında kullanılmıştır.
- PHP
- HTML
- MySQL
- JavaScript

