-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2021 lúc 06:11 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`Id`, `id_khachhang`, `cart_status`) VALUES
(1, 3, 0),
(2, 1, 2),
(3, 1, 1),
(4, 3, 2),
(5, 23, 1),
(6, 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id_cart` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `name_sanpham` varchar(45) DEFAULT NULL,
  `soluong_sanpham` int(11) NOT NULL,
  `price_sanpham` int(11) NOT NULL,
  `image_sanpham` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id_cart`, `id_sanpham`, `name_sanpham`, `soluong_sanpham`, `price_sanpham`, `image_sanpham`) VALUES
(1, 44, 'Lựu Ai Cập', 1, 200000, '46.jpg'),
(2, 46, 'Nước Cam Tươi', 3, 45000, '12.jpg'),
(3, 0, 'Nho đen ', 3, 280000, '4.jpg'),
(3, 11, 'Cải Xanh Hữu Cơ', 2, 20000, '15.jpg'),
(4, 0, 'Nho đen ', 1, 280000, '4.jpg'),
(5, 9, 'Ngũ Cốc Rau Củ Cho Bé', 1, 500000, '31.jpg'),
(5, 6, 'Bơ', 3, 95000, '7.jpg'),
(6, 46, 'Nước Cam', 3, 45000, '12.jpg'),
(6, 7, 'Đậu Cove Hữu Cơ  ', 1, 30000, '14.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupsp`
--

CREATE TABLE `groupsp` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `groupsp`
--

INSERT INTO `groupsp` (`id`, `name`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trái , cây', '', '', 0, 0, 0),
(2, 'Rau, Củ', '', '', 0, 0, 0),
(3, 'Ngũ cốc', '', '', 0, 0, 0),
(4, 'Nước', '', '', 0, 0, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `thumbnail`, `content`, `updated_at`) VALUES
(1, 'Fillet trực tiếp cá hồi Broodstock tại Fresh Foods Mart BamBo', '7.jpg', '<p>Cơ hội hiếm trong năm duy nhất 1 chú cá hồi giống bố mẹ size 11kg, “size khủng”, chất lượng tuyệt vời về kho Fresh Foods Mat và được fillet trực tiếp để đảm bảo hương vị cá hồi tươi ngon đích thực.</p>\r\n<p>Cá hồi- cá hồi giống bố mẹ được chăm sóc đảm bảo với nguồn thức ăn được chọn lọc kỹ lưỡng và giàu dinh dưỡng từ giai đoạn nuôi vỗ tới trưởng thành và sinh sản. Đặc biệt cá được nuôi trong môi trường đảm bảo điều kiện như thời gian chiếu sáng, nhiệt độ và độ PH được kiểm soát, chính những đặc điểm này tạo nên cân nặng đạt chuẩn và hương vị thịt tuyệt hảo cho cá hồi Broodstock.</p>\r\n<p>So với cá hồi , thịt cá hồi Brood stock có vị mềm ngậy , đậm đà và ngọt thịt hơn hẳn, có thể chế biến những món sushi, sashimi cao cấp trong những nhà hàng 5 sao sang trọng</p>\r\n<p>Chương trình tổ chức trong tuần tại Fresh Foods Mart Việt Hưng: 106 P6, Nguyễn Cao Luyện, Việt Hưng, Long Biên, Hà Nội . Cùng chờ đón sự kiện và xin mời quý khách trực tiếp qua cửa hàng để trải nghiệm và mua hàng!</p>', '2021-04-13'),
(2, 'Bắp cải loại thực phẩm sạch chứa lượng thuốc trừ sâu ít đến mức kinh ngạc, bán đầy ngoài chợ nhưng người Việt ít để tâm', '8.jpg', '<p>Bắp cải là loại rau củ sở hữu lượng nước dồi dào, ít chất béo và không chứa cholesterol phù hợp với người mắc bệnh tim mạch. Nó còn chứa lượng lớn vitamin E giúp cơ thể sản sinh collagen - một hợp chất giữ cho da luôn căng mịn và trẻ trung, thậm chí là chống lại các gốc tự do gây lão hóa sớm .</p>\r\n\r\n<p>EWG cho biết, bắp cải có khả năng tự sản sinh chất glucosinolate giúp bảo vệ và ngăn côn trùng tấn công. Điều này cũng đồng nghĩa rằng, nông dân không cần phun quá nhiều thuốc trừ sâu để diệt bọ, bản thân bắp cải đã tự chống chọi một cách tốt nhất rồi.</p>', '2021-04-14'),
(3, 'Thưởng Thức Hương Vị Smoothie Yogurt Bốn Mùa Hữu Cơ\r\n', '15.jpg', '<p>Smoothie được làm chủ yếu từ trái cây nên nghiễm nhiên lọt vào danh sách “đồ uống tốt cho sức khỏe” hiện nay, và cũng bởi lý do đó mà Smoothie đã trở thành món đồ uống hấp dẫn và thu hút hơn sinh tố thông thường trong xu hướng thưởng thức của giới trẻ hiện nay.</p>\r\n\r\n<p>Bạn có thể tự làm smoothie tại nhà bằng nhiều cách kết hợp khác nhau để thưởng thức hay để thuận tiện hiện cho mình bạn có thể thoải mái lựa chọn những loại smoothie tại cửa hàng organic food của chúng tôi. Sự kết hợp hoà quyện của trái cây và rau củ sẽ làm thành thức uống rất thơm ngon, giàu dinh dưỡng và bạn sẽ ngập tràn trong hương vị độc đáo của những chai smoothie này đấy nhé!!</p>\r\n\r\n<pBó xôi, chuối, dứa, yogurt, nước dừa là những thành phần chính để tạo nên smoothie yogurt bốn mùa hữu cơ, đây là thức uống đầy mới lạ và đậm hương vị để bạn ngập tràn năng lượng mỗi ngày đấy nhé. Những nguyên liệu hữu cơ được tuyển chọn kĩ và an toàn về chất lượng hoà quyện trong thức uống sẽ đưa bạn đến với thật nhiều bất ngờ trong cảm nhận đấy nhé!!</p>', '2021-04-13'),
(4, 'Vì Sao Nên Giữ Lại Vỏ Cam/Quýt?', '9.jpg', '<p>Bạn sẽ không vứt bỏ vỏ cam/quýt nữa khi biết chúng có công dụng tuyệt vời cho sức khỏe và làn da. Khám phá ngay những lợi ích diệu kì từ vỏ cam/quýt như sau nhé:</p>\r\n\r\n<p1. Xua đuổi côn trùng Muỗi và kiến rất ghét vỏ cam/quýt vì chúng không thích mùi thơm từ cam. Hãy rải vỏ cam/quýt ở những khu vực có kiến, bạn sẽ hiếm khi nhìn thấy chúng nữa đó. Hoặc chà vỏ cam/quýt khắp da để chống muỗi đốt.</p>\r\n\r\n<p>2. Giải rượu Khi say rượu, bạn sẽ bản thấy vô cùng khó chịu vì đau đầu, buồn nôn... Một ít vỏ cam đã rửa sạch, ngâm trong nước nóng tầm 20 phút, cùng một ít muối sẽ giúp bạn hồi phục nhanh chóng. Vỏ cam/quýt sẽ làm dịu các triệu chứng buồn nôn, chóng mặt, hoa mắt, nhức đầu, tim đập nhanh… Lưu ý dùng khi nước còn ấm nhé.</p>\r\n\r\n<p>3. Trị ho hiệu quả Vỏ cam/quýt là thần dược phương Đông trong việc điều trị họ, viêm họng. Hãy đun sôi 2 cốc nước cùng vỏ cam/quýt, một ít gừng tươi và đường, uống khi còn nóng. Các triệu chứng ho sẽ giảm đi từng ngày.</p>\r\n\r\n<p>4. Giảm hôi miệng Thường xuyên ngậm vỏ cam/quýt tươi trong miệng từ 5-10 phút hoặc nhai trực tiếp, việc này sẽ rất hữu hiệu trong việc điều trị chứng hôi miệng. Hãy kiên trì thực hiện, bạn sẽ thấy kết quả được cải thiện dần dần.</p>\r\n\r\n<p>5. Hỗ trợ người bị say xe Trước khi lên ô tô, tàu thủy hay máy bay khoảng 1 giờ, hãy ngửi một ít vỏ cam/quýt tươi bóp giập, để lan tỏa tinh dầu của cam/quýt. Sau khi lên tàu xe, tiếp tục lặp lại những thao tác trên sao cho ngửi được lượng tinh dầu một cách tối đa. Tinh dầu này có tác dụng hạn chế và ngăn ngừa cảm giác khó chịu như chóng mặt, buồn nôn khi di chuyển đường dài.</p>\r\n', '2021-04-13'),
(5, 'Top 5 Công Thức Làm Sữa Yến Mạch Lạ Miệng', '10.jpg', '<p>Yến mạch được biết đến là loại ngũ cốc dinh dưỡng rất bổ dưỡng cho sức khỏe của người sử dụng, yến mạch được sử dụng để làm bánh ngọt hay mặn đều rất ngon và hấp dẫn, ngoài ra yến mạch còn được dùng để làm rất nhiều món ăn khác và nhất là sữa yến mạch rất thơm ngon và béo ngậy để chăm sóc thật tốt cho sức khỏe của bé cũng như cho cả gia đình.</p>\r\n\r\n<p>Yến mạch có nhiều lợi ích cho sức khỏe như hỗ trợ giảm cân cực kỳ hiệu quả, hỗ trợ chăm sóc không chỉ da mặt mà cả da toàn trang trắng sáng, mịn mà. Ngoài ra, sữa yến mạch cũng đem đến một số lợi ích khác như: Cải thiện, giúp hệ tiêu hóa hoạt động tốt hơn, giảm được hàm lượng cholesterol trong cơ thể, dễ dàng kiểm soát được lượng đường trong máu, tạo cho các bạn cảm giác no lâu hơn, cải thiện sức đề kháng, hệ miễn dịch của cơ thể, ngăn ngừa các căn bệnh về tuyến giáp, hệ thần kinh và cả là lợi tiểu nữa.</p>', '2021-04-14'),
(6, 'Sữa Hạt Lợi Sữa Cho Mẹ Sau Sinh', '12.jpg', '<p>Trong sữa hạt có rất nhiều chất xơ và có chứa hàm lượng lớn Vitamin, chất bột đường, chất béo, đạm thực vật, omega 3,.. Đây đều là những hoạt chất tốt cho cho sức khỏe mẹ bầu và thai nhi. Việc sử dụng sữa hạt sẽ giúp kích thích ăn uống, giảm thiểu các tác động trong thời kỳ thai nghén. Do vậy uống sữa hạt lợi sữa tốt cho sức khỏe không chỉ các mẹ mà còn còn dành cho các thành viên trong gia đình.</p>\r\n\r\n<p>Sữa hạt lợi sữa giúp mẹ có sữa về nhiều và nhanh chóng bổ sung hàm lượng dinh dưỡng hợp lý giúp sức khỏe của bé được phát triển tốt nhất, những nghiên cứu này đã được chứng minh vì thế mẹ có thể tự chăm sóc cho mình bằng những loại sữa hạt dinh dưỡng thật đơn giản này đấy nhé:</p>', '2021-04-15'),
(7, 'SỮA HẠT ORGANIC LÀ GÌ?', '11.jpg', '<p>Sữa hạt organic là loại sữa rất giàu dinh dưỡng và tốt cho sức khỏe của mỗi chúng ta, sữa hạt organic phải đạt chuẩn an toàn vệ sinh thực phẩm từ khâu trồng cho đến khâu thu hoạch. Hạt organic luôn là sự lựa chọn hoàn hảo nhất cho bạn và những người thân yêu!!</p>\r\n\r\n<p>Hạt organic có rất nhiều loại và rất đa dạng về chủng loại để bạn tham khảo và lựa chọn, những loại hạt này rất thơm ngon và béo ngậy, bạn có thể kết hợp với nhau để tạo nên những loại thức uống thật tốt cho sức khỏe.</p>\r\n\r\n<p>Bạn có thể tự nấu sữa hạt organic tại nhà bằng nguyên liệu organic tại cửa hàng của chúng tôi để có được sữa hạt dinh dưỡng an toàn nhất cho sức khỏe của gia đình. Hay để tiết kiệm thời gian bạn cũng có thể mua sữa hạt organic được bán sẵn để thuận tiện hơn cho việc sử dụng của mình. Sữa hạt organic bán sẵn có thương hiệu và đạt chuẩn an toàn thực phẩm nên tuyệt  đối yên tâm khi dùng mỗi ngày. Hãy luôn cùng đồng hành cùng thực phẩm hữu cơ và hãy chăm sóc thật tốt cho sức khỏe của gia đình bạn nhé!!</p>', '2021-04-15'),
(8, 'Sữa Hạt Gồm Những Loại Hạt Nào Mới Là Tốt Nhất', '14.jpg', '<p>Trên thị trường tiêu dùng hiện nay có rất nhiều loại sữa được bán tràn lan khiến chúng ta mơ hồ về chất lượng sản phẩm, có sản phẩm thật nhưng cũng có sản phẩm giả đan xen chính vì thế nhiều mẹ đã chọn cách tự làm sữa hạt dinh dưỡng tại nhà để vừa đảm bảo an toàn về chất lượng lại giúp bé yêu phát triển toàn diện và thật khỏe mạnh mỗi ngày.</p>\r\n\r\n<p>Với mỗi độ tuổi khác nhau của bé mẹ sẽ có những nguyên liệu và cách chế biến sữa hạt khác nhau để thực sự phù hợp với sức khỏe của bé, mẹ nên cân nhắc và tìm hiểu về điều này để có thể hoàn thiện hơn trong việc chăm sóc cho sức khỏe của bé và cả gia đình mỗi ngày nhé.</p>\r\n\r\n<p>Sữa hạt dinh dưỡng có nhiều loại từ nhiều loại hạt đậu khác nhau, hạt hạnh nhân, hạt macca, hạt sen, óc chó, yến mạch,... mỗi loại hạt sẽ có những hương vị rất riêng và có hàm lượng dinh dưỡng rất tuyệt vời cho sức khỏe.</p>\r\n\r\n', '2021-04-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `detail` text NOT NULL,
  `price` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `pricenew` float NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `groupid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `price`, `soluong`, `image`, `pricenew`, `updated_at`, `status`, `groupid`) VALUES
(0, 'Nho đen Hàn Quốc', '', 350000, 49, '4.jpg', 280000, '2021-05-07 20:28:10', 1, 1),
(1, 'Cam Tươi', '', 300000, 100, '3.jpg', 280000, '2021-05-07 17:59:39', 1, 1),
(2, 'Cà chua', '', 300000, 100, '6.jpg', 280000, '2021-04-13 07:49:00', 1, 1),
(3, 'Ngũ Cốc CHANADAL', '', 500000, 100, '1.jpg', 380000, '2021-04-13 07:49:00', 1, 3),
(4, 'Nước dâu', '', 50000, 100, '2.jpg', 45000, '2021-04-13 07:49:00', 1, 4),
(5, 'Rau má', '', 15000, 100, '5.jpg', 12000, '2021-04-13 07:49:00', 1, 2),
(6, 'Bơ', '', 100000, 97, '7.jpg', 95000, '2021-04-13 07:49:00', 1, 1),
(7, 'Đậu Cove Hữu Cơ  ', '', 40000, 99, '14.jpg', 30000, '2021-04-13 07:49:00', 1, 2),
(8, 'Nước Dừa Hữu Cơ Cocoxim', '', 30000, 100, '13.jpg', 28000, '2021-05-07 17:51:40', 1, 4),
(9, 'Ngũ Cốc Rau Củ Cho Bé', '', 500000, 99, '31.jpg', 0, '2021-04-13 07:49:00', 1, 3),
(10, 'Dâu Giống New Zealand', '', 200000, 100, '38.jpg', 190000, '2021-04-13 07:49:00', 1, 1),
(11, 'Cải Xanh Hữu Cơ', '', 20000, 100, '15.jpg', 0, '2021-04-13 07:49:00', 1, 2),
(12, 'Ngũ Cốc MUESLI', '', 350000, 0, '10.jpg', 0, '2021-04-13 07:49:00', 1, 3),
(13, 'Dâu Hàn Quốc', '', 290000, 100, '39.jpg', 285000, '2021-04-13 07:49:00', 1, 1),
(14, 'Cải Bẹ Trắng Hữu Cơ', '', 50000, 100, '20.jpg', 45000, '2021-04-13 07:49:00', 1, 2),
(15, 'Cherry Giống New Zealand', '', 450000, 100, '32.jpg', 430000, '2021-04-13 07:49:00', 1, 1),
(16, 'Bí Đỏ Hữu Cơ', '', 35000, 100, '18.jpg', 30000, '2021-04-13 07:49:00', 1, 2),
(17, 'Kiwi Xanh', '', 180000, 100, '44.jpg', 150000, '2021-04-13 07:49:00', 1, 1),
(18, 'Cải Thảo Hữu Cơ', '', 25000, 100, '22.jpg', 22000, '2021-04-13 07:49:00', 1, 2),
(19, 'Cần Tây Hữu Cơ', '', 500000, 100, '23.jpg', 48000, '2021-04-13 07:49:00', 1, 2),
(20, 'Củ Hồi Hữu Cơ', '', 100000, 100, '16.jpg', 900000, '2021-04-13 07:49:00', 1, 2),
(21, 'Củ Sen Tươi', '', 20000, 100, '25.jpg', 0, '2021-04-13 07:49:00', 1, 2),
(22, 'Hành Poaro Hữu Cơ', '', 10000, 100, '26.jpg', 0, '2021-04-13 07:49:00', 1, 2),
(23, 'Hành Tím Hữu Cơ', '', 30000, 100, '27.jpg', 28000, '2021-04-13 07:49:00', 1, 2),
(24, 'Trà Xanh Gừng Fito', '', 70000, 100, '51.jpg', 65000, '2021-04-13 07:49:00', 1, 4),
(25, 'Húng Quế Hữu Cơ', '', 20000, 100, '29.jpg', 19000, '2021-04-13 07:49:00', 1, 2),
(26, 'Lá Bạc Hà Hữu Cơ', '', 50000, 100, '30.jpg', 46000, '2021-04-13 07:49:00', 1, 2),
(27, 'Cam Canh', '', 80000, 100, '35.jpg', 69000, '2021-04-13 07:49:00', 1, 1),
(28, 'Ngũ Cốc QUINOA', '', 300000, 100, '9.jpg', 280000, '2021-04-13 07:49:00', 1, 3),
(29, 'Cà Rốt Hữu Cơ', '', 35000, 100, '19.jpg', 30000, '2021-04-13 07:49:00', 1, 2),
(30, 'Bắp Ngọt Hữu Cơ', '', 20000, 100, '17.jpg', 0, '2021-04-13 07:49:00', 1, 2),
(31, 'Cherry Đỏ Chile', '', 290000, 100, '33.jpg', 0, '2021-04-13 07:49:00', 1, 1),
(32, 'Cải Bó Xôi Hữu Cơ', '', 50000, 100, '16.jpg', 40000, '2021-04-13 07:49:00', 1, 2),
(33, 'Sữa Gạo Hữu Cơ Vị Vani', '', 24000, 100, '52.jpg', 24000, '2021-04-13 07:49:00', 1, 4),
(34, 'Bưởi Da Xanh Hữu Cơ', '', 100000, 100, '34.jpg', 98000, '2021-04-13 07:49:00', 1, 1),
(35, 'Sữa Horizon', '', 44000, 100, '50.jpg', 40000, '2021-04-13 07:49:00', 1, 4),
(36, 'Chôm Chôm Organic', '', 90000, 100, '36.jpg', 0, '2021-04-13 07:49:00', 1, 1),
(37, 'Hồng Trà Hữu Cơ', '', 80000, 100, '47.jpg', 75000, '2021-04-13 07:49:00', 1, 4),
(38, 'Hồng Xiêm (Sapoche)', '', 130000, 100, '43.jpg', 0, '2021-04-13 07:49:00', 1, 1),
(39, 'Cải Kale Hữu Cơ', '', 80000, 100, '21.jpg', 75000, '2021-04-13 07:49:00', 1, 2),
(40, 'Dưa Hấu Hữu Cơ', '', 100000, 100, '40.jpg', 80000, '2021-04-13 07:49:00', 1, 1),
(41, 'Lê Nam Phi', '', 170000, 100, '45.jpg', 145000, '2021-04-13 07:49:00', 1, 1),
(42, 'Chuối Bala', '', 50000, 100, '37.jpg', 0, '2021-04-13 07:49:00', 1, 1),
(43, 'Hồng Giòn Hàn Quốc', '', 150000, 100, '42.jpg', 120000, '2021-04-13 07:49:00', 1, 1),
(44, 'Lựu Ai Cập', '', 220000, 100, '46.jpg', 200000, '2021-04-13 07:49:00', 1, 1),
(45, 'Húng Lủi Hữu Cơ', '', 40000, 100, '28.jpg', 30000, '2021-04-13 07:49:00', 1, 2),
(46, 'Nước Cam', '', 50000, 97, '12.jpg', 45000, '2021-05-14 18:45:49', 0, 4),
(47, 'Dưa Lưới Nhật ', '', 175000, 100, '41.jpg', 140000, '2021-04-13 07:49:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` int(1) NOT NULL,
  `username` varchar(200) NOT NULL,
  `tinhtrang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `address`, `phone`, `created_at`, `updated_at`, `position`, `username`, `tinhtrang`) VALUES
(1, 'Thái Huỳnh Như Ý ', '25f9e794323b453885f5181f1b624d0b', 'nhuyhuynh123@gmail.com', 'TPHCM', '0964635913', '2021-04-23 18:18:27', '2021-05-14 21:50:07', 1, 'nhuyhuynh123', 0),
(2, 'Hồ Bảo Trân ', '659ae7b7a6aeb65d00346f1afeaff123', '123456789', 'TPHCM', '0384054122', '2021-04-23 18:19:27', '2021-05-14 21:28:06', 2, 'tranho123', 0),
(3, 'Lý Lê Trung', 'e10adc3949ba59abbe56e057f20f883e', 'chunchun123@gmail.com', 'TPHCM', '0168405412', '2021-04-23 18:18:27', '2021-04-23 18:18:27', 2, 'chunchun123', 0),
(4, 'mi mi', 'e10adc3949ba59abbe56e057f20f883e', 'nhuyhuynh@gmail.com', 'TPHCM', '5166262623', '2021-05-14 20:53:45', '2021-05-14 20:53:45', 2, 'hotran123', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Chỉ mục cho bảng `groupsp`
--
ALTER TABLE `groupsp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
