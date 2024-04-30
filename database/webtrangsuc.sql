-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2024 lúc 01:39 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idhoadon` varchar(50) NOT NULL,
  `idsanpham` varchar(50) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `dongia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` varchar(50) NOT NULL,
  `taikhoankh` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `sonha` varchar(50) DEFAULT NULL,
  `tentp` varchar(50) DEFAULT NULL,
  `tenquan` varchar(50) DEFAULT NULL,
  `tenduong` varchar(50) DEFAULT NULL,
  `ngaymua` datetime DEFAULT NULL,
  `phuongthucthanhtoan` int(11) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `tongtien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `hoten` varchar(50) DEFAULT NULL,
  `taikhoankh` varchar(50) NOT NULL,
  `matkhau` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `sonha` varchar(50) DEFAULT NULL,
  `tenduong` varchar(50) DEFAULT NULL,
  `tenquan` varchar(50) DEFAULT NULL,
  `tentp` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `trangthaitk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `malsp` varchar(10) NOT NULL,
  `tenloaisp` varchar(200) DEFAULT NULL,
  `hinhloaisp` varchar(50) DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`malsp`, `tenloaisp`, `hinhloaisp`, `mota`) VALUES
('BRL', 'Bracelet', 'Bracelet.jpeg', 'A bracelet is an article of jewellery that is worn around the wrist. Bracelets may serve different uses, such as being worn as an ornament. When worn as ornaments, bracelets may have a supportive func'),
('NKL', 'Necklace\r\n', 'Necklace.jpeg', 'A necklace is an article of jewellery that is worn around the neck. Necklaces may have been one of the earliest types of adornment worn by humans.[1] They often serve ceremonial, religious, magical.'),
('RG', 'Ring\r\n', 'Ring.png', 'A ring is a round band, usually made of metal, worn as ornamental jewelry. The term \\\\\\\"ring\\\\\\\" by itself denotes jewellery worn on the finger; when worn as an ornament elsewhere, the body part is sp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `hoten` varchar(50) DEFAULT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) DEFAULT NULL,
  `quyen` varchar(20) DEFAULT NULL,
  `trangthaitk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` varchar(50) NOT NULL,
  `soluong` int(200) DEFAULT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `maloaisp` varchar(10) DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `mota` varchar(2000) DEFAULT NULL,
  `hinhanh` varchar(200) DEFAULT NULL,
  `chatlieu` varchar(20) DEFAULT NULL,
  `mausac` varchar(20) DEFAULT NULL,
  `kichthuoc` double DEFAULT NULL,
  `gioitinh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`, `gioitinh`) VALUES
('BRL1', 21, 'Chain Style Bracelet', 'BRL', 1234, 'The bracelet possesses the solidity of 18K Italian gold, delicately crafted, combining casting, beading and engraving details according to Italian jewelry technology, creating shine and luxury. With a unique design and sharp metallic luster, the product will enhance the beauty of ladies.\n\nIn addition, with the sophisticated design of the bracelet, she will be surprised when combined with outfits such as office suits or street dresses. With the highlights on the products, PNJ believes that she will truly shine and stand out when wearing them.', 'gv0000w000694-vong-tay-vang-trang-y-18k-pnj-1.png', 'White Gold', 'White', 52, 'F'),
('BRL10', 12, 'Pearl Bracelet', 'BRL', 2470, 'Exuding an attractive look, the STYLE By PNJ x Chou Chou bracelet with pearl accents is not only jewelry that enhances beauty but also helps the owner express their own personality. The design was inspired by Chau Bui, a symbol of youth, overcoming obstacles to assert their personality in their own way, unlike any other role model.\n\nSTYLE By PNJ understands that girls always have the privilege to be beautiful and shine to create their own style. To unleash creativity with each girl\'s own choices, she can combine many other items to easily mix & match together depending on her fashion personality and always refresh her appearance every day.', 'tvnhnhs000001-vong-tay-dinh-da-style-by-pnj-01.png', 'GOLD, PEARL', 'Gold', 51, 'F'),
('BRL11', 21, 'Silver Bracelet', 'BRL', 355, 'To honor her luxurious and powerful beauty, PNJ launches exquisite designs with a harmonious combination of diamonds and sophisticated 18K gold. And to provide many choices for the main stone, PNJ offers a luxurious and sophisticated Diamond ring case model.\r\n\r\nWe believe that diamond jewelry in general and rings in particular will always be the perfect choice for women to perfect their aesthetic appearance with unique personality. PNJ is proud to offer exquisite stone jewelry, giving you many choices for your style.', 'sp-sv0000a060002-vong-tay-bac-style-by-pnj-1.png', 'Silver', 'White, Black', 16, 'U'),
('BRL2', 23, 'Italy Golden Bracelet', 'BRL', 2470, 'The bracelet possesses the solidity of 18K Italian gold, delicately crafted, combining casting, beading and engraving details according to Italian jewelry technology, creating shine and luxury. With a unique design and sharp metallic luster, the product will enhance the beauty of ladies.\n\nIn addition, with the sophisticated design of the bracelet, she will be surprised when combined with outfits such as office suits or street dresses. With the highlights on the products, PNJ believes that she will truly shine and stand out when wearing them.', 'gv0000z060344-vong-tay-vang-y-18k-pnj-1.png', 'Gold', 'White, Gold', 53, 'F'),
('BRL3', 20, 'Diamond Gem Bracelet', 'BRL', 1500, 'The bracelet possesses the solidity of 18K Italian gold, delicately crafted, combining casting, beading and engraving details according to Italian jewelry technology, creating shine and luxury. With a unique design and sharp metallic luster, the product will enhance the beauty of ladies.\n\nIn addition, with the sophisticated design of the bracelet, she will be surprised when combined with outfits such as office suits or street dresses. With the highlights on the products, PNJ believes that she will truly shine and stand out when wearing them.', 'gv00ddw000302-vo-vong-tay-kim-cuong-vang-trang-18k-pnj-.png', 'White Gold', 'White', 51, 'F'),
('BRL4', 12, 'Shining Princess Bracelet', 'BRL', 5300, 'Inspired by the good values ​​of each princess along with meaningful messages from colored stone jewelry, creating The Shining Princesses collection from Disney|PNJ with warm heart symbols and images. brave crown.\n\nThe 14K gold bracelet studded with Ruby with a luxurious crown-like stone shape, is made up of the special qualities of each girl, helping princesses always take control of their lives. Red Ruby represents courage and bravery from within, bringing power and nobility.', 'gvrbmxx000001-vong-tay-vang-14k-dinh-da-disneypnj-1.png', 'Gold, Ruby', 'Pink', 52, 'F'),
('BRL5', 20, 'Cuban Bracelet', 'BRL', 1000, 'The bracelet possesses the solidity of 18K Italian gold, delicately crafted, combining casting, beading and engraving details according to Italian jewelry technology, creating shine and luxury. With a unique design and sharp metallic luster, the product will enhance the beauty of ladies.\n\nIn addition, with the sophisticated design of the bracelet, she will be surprised when combined with outfits such as office suits or street dresses. With the highlights on the products, PNJ believes that she will truly shine and stand out when wearing them.', 'Q-5727-GP_180x.png', 'Gold, Czs', 'Gold, White', 55, 'M'),
('BRL6', 22, 'Tangled Bracelet', 'BRL', 999, 'Like spring flower buds waiting to bloom, the gold bracelet in the Tangled Collection has soft edges and combines the purple color of the Amethyst stone with small round stones, highlighting the bright main stone. brilliant. Besides, with the use of 10K gold material to craft, the product also has a noble design, worthy of being an \"assistant\" that doubles her elegance.\n\nPutting into every detail of the product, Disney hopes that women in the new year will be as radiant as elegant irises and attract luck to themselves.', 'sp-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-01.png', 'GOLD', 'Pink', 51, 'F'),
('BRL7', 50, 'Gem Bracelet', 'BRL', 987, 'Like spring flower buds waiting to bloom, the gold bracelet in the Tangled Collection has soft edges and combines the purple color of the Amethyst stone with small round stones, highlighting the bright main stone. brilliant. Besides, with the use of 10K gold material to craft, the product also has a noble design, worthy of being an \"assistant\" that doubles her elegance.\n\nPutting into every detail of the product, Disney hopes that women in the new year will be as radiant as elegant irises and attract luck to themselves.', 'single-pro-thumb-3.jpg', 'Gold', 'Blue', 49, 'F'),
('BRL8', 21, 'Love Bracelet', 'BRL', 1402, 'Possessing a design that is not too strange but extremely unique, the PNJSilver bracelet is crafted from 92.5 silver material, giving it a youthful, unconventional and \"high fashion\" appearance.\n\nAdorning her wrist with a lovely silver bracelet, this will definitely be a delicate touch that adds personality, dynamism and youthfulness to girls. Although it only has a simple design with small stone accents, it is an accessory that helps girls look elegant, feminine and stand out more than ever.', 'SVXMXMX000003-Vong-tay-Bac-PNJSilver-1.png', 'Silver, Diamond', 'Pink', 51, 'F'),
('BRL9', 12, 'ECZ Bracelet', 'BRL', 1223, 'The bracelet possesses the solidity of 18K Italian gold and is exquisitely crafted, combining casting, beading and engraving details according to Italian jewelry technology, creating shine and luxury. With a unique design and sharp metallic luster, the product will enhance the beauty of ladies.\n\nIn addition, with the sophisticated design of the bracelet, she will be surprised when combined with outfits such as office suits or street dresses. With the highlights on the products, PNJ believes that she will truly shine and stand out when wearing them.', 'sp-gvxm00w000364-vong-tay-vang-trang-y-18k-dinh-da-ecz-pnj-1.png', 'White Gold, ECz', 'White', 51, 'F'),
('NKL10', 30, 'Gold Chain Style', 'NKL', 999, 'By combining 18K gold material with delicate design, the necklace is the highlight, adding elegance and charm to her. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.\n\nWhether wearing an evening outfit or simply an everyday outfit, the necklace will create an absolute highlight around the collarbone and attract attention around.\nWhether wearing an evening outfit or simply an everyday outfit, the necklace will create an absolute highlight around the collarbone and attract attention around.', 'sp-gd0000y060490-day-chuyen-vang-18k-pnj-1.png', 'GOLD', 'Gold', 45, 'M'),
('NKL11', 12, 'Wedding Gold NEcklace', 'NKL', 1888, 'Honoring the noble beauty of a lady, the 24K gold necklace will definitely be the highlight of the big day. The unique appeal of the design is created from an extremely graceful design with sophisticated stylized highlights, creating a sophisticated product that conquers all eyes.\n\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.', 'gc0000y000316-day-co-vang-pnj-1.png', 'GOLD', 'Gold', 40, 'M'),
('NKL12', 18, 'Lunar Year 2024 Necklace', 'NKL', 2024, 'Giving top priority to new brides, PNJ offers wedding necklaces in the Trau Areca Collection with a design based on betel leaves and areca nuts. Crafted from 24K gold (99% pure gold), with soft properties, these jewelry items usually have eye-catching and sophisticated designs.  The outside of the betel leaf is shaped like a graceful phoenix wing, surrounded by an areca nut inside, showing the harmony between the betel piece and the phoenix wing, which is both rich in national culture and identity while also expressing the strong feelings of the people. couple. PNJ hopes that the PNJ Betel and Areca Wedding Jewelry collection will not only be a sacred mark in the wedding, but also become an inspiration for couples to be ready to hold hands and go on the journey together. Let life\'s important milestones be engraved with complete happiness with artifacts that honor traditional values ​​through modern design.', 'sp-gd0000y060529-day-chuyen-vang-14k-pnj-1.png', 'GOLD', 'Gold', 42, 'U'),
('NKL13', 8, 'Graduated Gold Necklace', 'NKL', 2004, 'Tassels have been used in jewelry for the longest time – and necklaces are no exception. These types of necklaces are crafted from a mix of materials, including chain, glass beads, metallic components and thread, leather, or silk for the tassel part. Tassel necklaces are usually on the longer side, sit on the lower chest or towards the waist and have an elongated construction. They are considered bohemian pieces of jewelry, although more polished versions are available as well and usually crafted from chains and gemstones', 'sp-gd0000y012000-day-chuyen-vang-y-18k-pnj-2.png', 'Gold', 'Gold', 41, 'F'),
('NKL2', 20, 'Golden Wedding Necklace 24K', 'NKL', 1300, 'Honoring the noble beauty of a lady, the 24K gold necklace will definitely be the highlight of this important day. The unique appeal of the design is created from an extremely graceful design with sophisticated stylized highlights, creating a sophisticated product that conquers all eyes.\n\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.', 'GC0000Y000023-1.png', 'Gold', 'GOLD', 42, 'F'),
('NKL3', 22, 'loving flower', 'NKL', 3000, 'Honoring the noble beauty of a lady, the 24K gold necklace will definitely be the highlight of the big day. The unique appeal of the design is created from an extremely graceful design with sophisticated stylized highlights, creating a sophisticated product that conquers all eyes.\n\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.', 'gc0000y000029-day-co-cuoi-vang-24k-pnj-hoa-tinh-yeu-1.png', 'Gold', 'GOLD', 40, 'F'),
('NKL4', 12, 'Tennis Necklace', 'NKL', 2300, 'Honoring the noble beauty of a lady, the 24K gold necklace will definitely be the highlight of the big day. The unique appeal of the design is created from an extremely graceful design with sophisticated stylized highlights, creating a sophisticated product that conquers all eyes.\n\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.', 'tennis.png', 'Gold', 'GOLD', 16, 'M'),
('NKL5', 20, 'True Love Necklace', 'NKL', 2400, 'Luxurious, pristine colored stone jewelry is a gift for people to exchange during the cold days at the end of the year. The Topaz stone necklace design will definitely help her shine with an elegant charisma. Not only does it possess a trendy design with sophisticated 14K gold, the ring also resonates with a luxurious dark blue color, honoring the lady\'s beauty.\n\nDedicated to girls who love festivals, the noble blue Topaz stone is definitely a jewelry model that cannot be ignored at the end of the year.', 'gctpxmw000021-day-co-vang-trang-14k-dinh-da-topaz-pnj-true-love-001.png', 'White Gold', 'White, Blue', 15, 'F'),
('NKL6', 11, '18K Gold Necklace ', 'NKL', 1050, 'By combining 18K gold material with delicate design, the necklace is the highlight, adding elegance and charm to her. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.\n\nWhether worn on an evening outfit or simply as an everyday outfit, the necklace will create an absolute highlight around the collarbone and attract attention around.', 'sp-gd0000y060490-day-chuyen-vang-18k-pnj-1.png', 'GOLD', 'GOLD', 40, 'M'),
('NKL7', 15, 'Italy White Gold Necklace', 'NKL', 1257, 'By combining 18K Italian Gold with delicate design, the gold necklace is the highlight, adding elegance and charm to her. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.\n\nWhether wearing an evening outfit or simply an everyday outfit, the necklace will create an absolute highlight around the collarbone and attract attention around.', 'sp-gd0000w000949-day-chuyen-vang-trang-y-18k-pnj-1.png', 'White Gold 18K', 'White', 42, 'F'),
('NKL8', 21, 'Passionate Love', 'NKL', 3152, 'Honoring the noble beauty of a lady, the 24K gold necklace will definitely be the highlight of the whole outfit. The unique appeal of the design is created from an extremely graceful design with sophisticated stylized highlights, creating a sophisticated product that conquers all eyes.\n\nPNJ is proud to offer exquisite jewelry models, giving you many choices for your style. With all the respect and emotions reserved for women, every detail is cherished and carefully placed by PNJ artisans into worthy jewelry designs.', 'gc0000y000037-day-co-cuoi-vang-24k-pnj-tinh-nong-1.png', 'Gold', 'GOLD', 42, 'F'),
('NKL9', 5, 'Water Necklace', 'NKL', 2115, 'By combining 18K Italian Gold with delicate design, the gold necklace is the highlight, adding elegance and charm to her. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.\n\nWhether wearing an evening outfit or simply an everyday outfit, the necklace will create an absolute highlight around the collarbone and attract attention around.', 'sp-gd0000w000983-day-chuyen-vang-trang-y-18k-pnj-1.png', 'White Gold', 'White', 42, 'F'),
('RG1', 12, 'Butterfly Ring ', 'RG', 1234, 'Regardless of age, classic or modern style, the color of white ECZ stones always knows how to please fashionistas. \n', 'product-3.jpg', 'GOLD', 'Gold', 11, 'F'),
('RG2', 20, 'Topaz Ring', 'RG', 500, 'With the combination of the delicate green color of Topaz stone and the sparkle of white stones, PNJ brings the masterpiece of Topaz stone gold rings to proud women with their trendy fashion sense.\n\nBesides, the ring is crafted from 14K gold and also simulates the proud beauty of modern ladies. A pair of earrings and a Topaz stone ring will help her outfit become elegant and stylish.', 'sp-gntpxmw000659-nhan-vang-trang-14k-dinh-da-topaz-pnj-1.png', 'GOLD', 'White', 13, 'F'),
('RG3', 32, 'Hello Kitty Ring', 'RG', 250, 'With the combination of the delicate green color of Topaz stone and the sparkle of white stones, PNJ brings the masterpiece of Topaz stone gold rings to proud women with their trendy fashion sense.\n', 'sp-gnztxmx000013-nhan-vang-14k-dinh-da-synthetic-pnj-hello-kitty-1.png', 'GOLD', 'Bronze', 12, 'F'),
('RG4', 50, 'Faith Ring', 'RG', 2024, 'Inspired by the image of full energy from the sun with 10 rays of light illuminating the meaning of \"Ten perfect, ten beautiful\" or \"ten parts of ten\", PNJ launches the Faith Collection with luxurious jewelry models. and unique.\n\nInspired by the image of full energy from the sun with 10 rays of light illuminating the meaning of Ten perfect, ten beautiful or ten parts of ten, PNJ launches the Faith Collection with luxurious jewelry models. and unique.\n\nExclusively for ladies with a unique diamond ring in the collection. PNJ brings a 14K gold ring with a diamond as the main stone on a design from the sun and 10 rays of light, creating luxury and personality while still ensuring sophistication. This will definitely be the perfect gift for women.', '1sp-gnddddh000515-nhan-kim-cuong-vang-14k-pnj-niem-tin-01.png', 'Gold, Diamond', 'White', 11, 'F'),
('RG5', 12, 'Wedding Ring', 'RG', 4224, 'Let the materials come together this wedding season. Couples can choose for themselves a ring from the Trau Areca Collection, crafted from 14K gold and scored with exquisitely studded diamond accents. Not only is it a beautiful piece of jewelry, it is also an engagement item for the new couple\'s vow of happiness.\n\nHonoring the beauty and maturity of true love, PNJ and couples are ready for the marriage journey with the PNJ Betel and Areca Wedding Jewelry collection - Artifacts that mark a radiant wedding, portraying an image Trau Tem Phuong Wing in contemporary design lines.', 'sp-gnddddw011758-nhan-cuoi-kim-cuong-vang-trang-14k-pnj-trau-cau-1.png', 'White Gold, Diamond', 'White', 13, 'F'),
('RG6', 12, 'Betel n Areca Ring', 'RG', 4554, 'Let the materials come together this wedding season. Couples can choose for themselves a ring from the Trau Areca Collection, crafted from 14K gold and scored with exquisitely studded diamond accents. Not only is it a beautiful piece of jewelry, it is also an engagement item for the new couple\'s vow of happiness.\n\nHonoring the beauty and maturity of true love, PNJ and couples are ready for the marriage journey with the PNJ Betel and Areca Wedding Jewelry collection - Artifacts that mark a radiant wedding, portraying an image Trau Tem Phuong Wing in contemporary design lines.', 'sp-gnddddw011763-nhan-cuoi-kim-cuong-vang-trang-14k-pnj-trau-cau-1.png', 'White Gold, Diamond', 'White', 13, 'F'),
('RG7', 21, 'Diamond Thin Ring', 'RG', 1233, 'Diamonds are inherently a piece of jewelry that brings pride and endless fashion inspiration. Owning your own diamond jewelry is what everyone desires. The ring is crafted from platinum with diamond accents with 57 precisely cut facets, creating jewelry full of luxury and class.\r\n\r\nDiamonds are beautiful, diamond jewelry is even more irresistible. This new combination will definitely create a mark in modern fashion and help ladies stand out, be confident and attract everyone\'s admiration.', 'sp-pndd00w000384-nhan-bach-kim-dinh-kim-cuong-pnj-1.png', 'Platinum', 'White', 16, 'M'),
('RG8', 32, 'Golden Dragon', 'RG', 1244, 'Inspired by the symbol of a wish-fulfilling club face, PNJ brings the Kim Long Truong Cuu Collection with exquisitely crafted gold jewelry. The collection brings style, class, attracts fortune and prosperity to gentlemen in the new year Giap Thin 2024.\r\n\r\nThe ring is crafted from 10K gold with the art of arranging 9 ECZ stones with the meaning \"Long Nine\" cleverly integrated, creating a highlight, symbolizing the desire for a sustainable career and conquering all heights of success. labour.', 'sp-gnxmxmw004712-nhan-nam-vang-trang-10k-dinh-da-ecz-pnj-kim-long-truong-cuu-1.png', 'Gold', 'White', 19, 'M'),
('RG9', 22, 'Champion Ring', 'RG', 4554, 'To honor her luxurious and powerful beauty, We launches exquisite designs with a harmonious combination of diamonds and sophisticated 18K gold. And to provide many choices for the main stone, PNJ offers a luxurious and sophisticated Diamond ring case model.\r\n\r\nWe believe that diamond jewelry in general and rings in particular will always be the perfect choice for women to perfect their aesthetic appearance with unique personality. PNJ is proud to offer exquisite stone jewelry, giving you many choices for your style.', 'sp-gnddddh000372-nhan-nam-kim-cuong-vang-18k-pnj-1.png', 'Gold, Diamond', 'White', 21, 'M');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idhoadon`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `taikhoankh` (`taikhoankh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`taikhoankh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`malsp`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`taikhoan`);

-- Du lieu cua bang manager
INSERT INTO `manager` (`hoten`, `taikhoan`, `matkhau`, `trangthaitk`) VALUES ('Trinh Long Phat', 'longphat102', '0393165728', '1')


--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `maloaisp` (`maloaisp`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`taikhoankh`) REFERENCES `khachhang` (`taikhoankh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloaisp`) REFERENCES `loaisanpham` (`malsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
