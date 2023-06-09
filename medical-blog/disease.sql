-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230212.f19d22c671
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2023 at 07:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disease`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `symptoms` varchar(1200) NOT NULL,
  `reasons` varchar(1200) NOT NULL,
  `diagnosis` varchar(1200) NOT NULL,
  `medicine` varchar(1200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `doctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `description`, `symptoms`, `reasons`, `diagnosis`, `medicine`, `image`, `doctorId`) VALUES
(6, 'مرض الجدري - Smallpox', 'مرض الجدري هو مرض فتاك، لدرجة أنه إذا تأكد ظهور مرض الجدري فمن المهم جدًا عدم الاقتراب من الأشخاص المصابين بالفيروس، إذا مكث شخص ما بالقرب من شخص مصاب بمرض الجدري، فيتوجب عليه التوجه للحصول على لقاح ضد مرض الجدري، وإذا بدأت أعراض مرض الجدري بالظهور يجب التوجه لتلقي العلاج الطبي على الفور.', 'تبدأ الأعراض بالظهور بشكل عام بعد 12 يومًا من الإصابة بالفيروس، ومن أبرز أعراض مرض الجدري ما يأتي:\r\n<br><br>\r\nالشعور العام بمرض الجدري.<br>\r\nالتعب والهزال.<br>\r\nارتفاع حاد جدًا في درجة حرارة الجسم.<br>\r\nطفح شديد على الجلد.<br>\r\nأوجاع في الظهر والرأس.<br>\r\nبعد يومين إلى ثلاثة أيام من الشعور العام بمرض الجدري يبدأ بالظهور طفح جلدي ذو بقع مسطحة حمراء اللون، يبدأ الطفح الجلدي بالظهور إجمالًا على الوجه وعلى المنطقة العليا من الذراعين، ثم ينتشر بعد ذلك في كافة أنحاء الجسم.\r\n<br><br>\r\nبعد نحو أسبوعين إلى ثلاثة أسابيع تصبح البقع المسطحة ذات اللون الأحمر أكثر صلابة تعلوها قبيبات ممتلئة بالقيح، ثم تكتسي كل قبيبة بجُلبَة أي قشرة الجرح (Scab / Crust)، وتزول هذه الجلبات عادةً بعد 3 – 4 أسابيع منذ لحظة ظهور الطفح مخلفةً وراءها ندوبًا.\r\n<br><br>\r\nقد يخلط البعض بين مرض الجدري وبين حالة حادة من مرض الحُماق أي جدري الماء (Varicella)، لكن الفيروسين المسببين لهذين المرضين يختلفان عن بعضهما البعض كليًا.', 'مرض الجدري هو مرض معدٍ جدًا حيث ينتقل المرض من شخص إلى آخر عن طريق السعال، العطس أو التنفس، كما عن طريق ملامسة الجلبات أو إفرازات الجروح، وأكثر من هذا قد ينتقل مرض الجدري أيضًا عن طريق ملامسة الأغراض الشخصية أو أغطية السرير التابعة لشخص مصاب بمرض الجدري.\r\n<br><br>\r\nينتشر مرض الجدري بسهولة فائقة خلال الأسبوع الأول من ظهور الطفح وعند تكوّن الجلبات يقل احتمال نقل العدوى، لكن الشخص المصاب بمرض الجدري يكون قادرًا على نشر الفيروس منذ لحظة ظهور الطفح وحتى لحظة تساقط الجلبات.\r\n<br><br>\r\n\r\nفي حال وقوع حادث معين يقوم خلاله شخص ما بإطلاق كمية صغيرة من فيروسات مرض الجدري في الهواء، يحتمل أن تنتشر الفيروسات لتصيب مجموعة كبيرة جدًا من الناس، فهذا الفيروس يتمتع بقدرة على البقاء على قيد الحياة والإصابة بالعدوى لفترة تمتد من 6 ساعات حتى 24 ساعة تبعًا لحالة الطقس، ومن هنا يتوجب على الذين أصيبوا بالفيروس أن يبقوا بعيدين عن الأشخاص الآخرين منعًا لانتشار الفيروس أكثر.', 'إذا شك الطبيب بوجود مرض الجدري فإنه يوجه المريض إلى إجراء فحص للدم للتحقق من تشخيص الحالة، وفي حال تأكيد الكشف عن فيروس الجدري يتم توجيه تحذير دولي عام.\r\n<br><br>\r\n\r\nعند التأكد من تفشي الفيروس يستطيع الطبيب المعالج تأكيد التشخيص دون الحاجة إلى إجراء أي فحص مخبري، حيث يفحص الطبيب الطفح الجلدي ويوجه للمريض بعض الأسئلة حول الأعراض وحول احتمال تعرضه للفيروس.', 'لا يوجد حتى اليوم دواء لمعالجة مرض الجدري، معالجة مرض الجدري تشمل شرب السوائل بكمية كافية وتناول الأدوية لموازنة درجة حرارة الجسم وتسكين الأوجاع، للحد من انتشار العدوى يتوجب على الشخص الذي أُصيب بمرض الجدري أن يتجنب ملامسة الآخرين أو الاقتراب منهم حتى تنتهي فترة العدوى.', 'الجدري.jpg', 1),
(7, 'الجرب - Scabies', 'يُعد الجرب أحد الأمراض الجلدية التي تتميز بظهور حكّة شديدة تسببها مجموعة من الطفيليات تسمى السوس، وهي أحد أنواع المفصليات التي تتكاثر داخل طبقات الجلد.\r\n<br><br>\r\n\r\nقد يُصاب جميع الأشخاص بالجرب في أية عمر، ومن أية مكان، كما أن الأشخاص الذين يحافظون على نظافتهم الشخصية معرضون أيضًا للإصابة بهذا المرض.', 'من أبرز أعراض الجرب الحكة الشديدة في الجلد، وتزداد حدتها في ساعات الليل، تظهر الحكة لدى الأطفال وكبار العمر بشكل أكثر حدة، وقد يُعاني الأطفال من آثار جانبية حادة على سطح الجلد.\r\n<br><br>\r\n\r\nفي معظم الأحيان تبدأ الأعراض بالظهور على الأشخاص بعد عدة أيام من الإصابة للمرة الأولى بالمرض.', 'تنتشر طفيليات القارمة الجربية (Sarcoptes scabieis) بواسطة الملامسة المباشرة مع شخص مصاب بالمرض، وقد ينتشر مرض الجرب أيضًا جراء استعمال الأدوات الشخصية، مثل: المنشفة، أو غطاء السرير لشخص مصاب.\r\n<br><br>\r\n\r\nلذلك فقد يصاب عدد من أفراد العائلة بالمرض في الفترة نفسها، وقد ينقل شخص مصاب المرض إلى شخص آخر قبل ظهور الأعراض لديه.', 'يستطيع طبيب الجلد تشخيص الإصابة بمرض الجرب من خلال فحص الأعراض والعلامات على جسم المريض، ومن المرجح أن يكون الشخص المعني قد أُصيب بالجرب إذا كان قد حصل تلامس مباشر بينه وبين شخص آخر يعاني من الأعراض نفسها.\r\n<br><br>\r\n\r\nفي بعض الأحيان يستطيع الطبيب تشخيص هذا المرض من خلال البحث عن علامات تدل على وجود طفيليات القارمة الجربية، وذلك من خلال أخذ خزعة (Biopsy) من جلد الشخص المصاب.\r\n<br><br>\r\n\r\nيقوم الطبيب بحك الجلد بلطف في المنطقة التي تبدو مصابة، ثم يقوم بفحص العينة تحت المجهر، ولا يسبب ذلك عادةً أية ألم للمريض.', 'يجب علاج مرض الجرب إذ إنه لا يزول بدون المعالجة، ويتم العلاج من خلال دهن مرهم أو مستحلب ملائم بناءً على وصف الطبيب المعالج، أو في بعض الحالات الحادة قد يصف الطبيب بعض الأدوية التي يتم تناولها لمعالجة الجرب بناءً على حالة المريض.\r\n<br><br>\r\n\r\nعند إصابة شخص ما بمرض الجرب ينبغي معالجته هو وجميع الأشخاص الذين يعيشون معه، وذلك منعًا لانتقال الطفيليات المسببة للمرض من شخص إلى آخر، ومن المهم الحرص على غسل الملابس، والمناشف، وأغطية الأسرّة.', 'الجرب.jpg', 1),
(8, 'الصدفية - Psoriasis', 'الصـدفية هو مرض جلدي شائع يؤثر على الدورة الحياتية لخلايا الجلد، عند الإصابة بها تتراكم الخلايا على سطح الجلد بسرعة لتشكل قشورًا فضية سميكة وطبقات مثيرة للحكة، جافّة وحمراء تسبب الألم أحيانًا.\r\n<br><br>\r\n\r\nالصدفية مرض عنيد يستمر لفترة طويلة هناك فترات تتحسن فيها أعراض الصدفية وتخفّ بينما يشتد مرض الصدفية في فترات أخرى، بالنسبة لبعض المرضى الصدفية لا يتعدى كونه مصدر إزعاج أما بالنسبة للبعض الآخر فمن الممكن أن يسبب العجز وخصوصًا عندما يكون مرتبط بالتهاب المفاصل.', 'أعراض مرض الصدفية تختلف من شخص لآخر، لكنها يمكن أن تشمل واحدة أو أكثر من الأعراض الآتية:\r\n<br><br>\r\n\r\nطبقات حمراء على الجلد تكسوها قشور فضية اللون.<br>\r\nنقاط صغيرة مغطاة بالقشور.<br>\r\nجلد جاف ومتصدّع ونازف في بعض الأحيان.<br>\r\nحكّة وحرقة أو ألم.<br>\r\nأظافر سميكة أو مليئة بالندوب.<br>\r\nتورّم وتيبّس المفاصل.<br>\r\nالطبقات على الجلد نتيجة للصدفية يمكن أن تظهر كبضع نقاط من القشور وحتى طفح جلدي يغطي مساحة واسعة، والحالات الخفيفة من الصدفية قد تكون مصدر إزعاج لا أكثر، أما الحالات الأكثر حدّة من الصدفية فقد تسبب الألم والعجز.\r\n<br><br>\r\nمعظم أنواع الصدفية تتطور بشكل دوري، حيث تستمر النوبة بضعة أسابيع أو أشهر ثم تهدأ لبعض الوقت، بل وقد تختفي تمامًا لكنها في معظم الحالات تعود في نهاية الأمر كما كانت.', 'ينشأ مرض الصدفية جراء سبب يتعلق بجهاز المناعة وتحديدًا بنوع معين من خلايا الدم البيضاء التي تسمى الخلايا اللمفاوية التائيّة.\r\n<br><br>\r\n\r\nفي الوضع الطبيعي العادي تتنقـّل هذه الخلايا في جميع أنحاء الجسم للعثور على المواد الغريبة، مثل: البكتيريا، والفيروسات، لكن عند مرضى الصدفية تقوم هذه الخلايا اللمفاوية بمهاجمة خلايا الجلد السليمة عن طريق الخطأ.\r\n<br><br>\r\n\r\nالخلايا اللمفاوية التائيّة الفعّالة أكثر من اللزوم تثير ردود فعل مختلفة في الجهاز المناعي، مثل: توسيع الأوعية الدموية حول طبقات الجلد، وزيادة كميات من خلايا دم أخرى يمكنها اختراق البشرة.\r\n<br><br>\r\n\r\nنتيجة لهذه التغيرات ينتج الجسم المزيد من خلايا الجلد السليمة والمزيد من الخلايا اللمفاوية التائيّة وغيرها من خلايا الدم البيضاء، ونتيجة لذلك تصل خلايا جلدية جديدة إلى الطبقة الخارجية من الجلد بسرعة كبيرة جدًا في غضون أيام قليلة بدلًا من أسابيع كما هو في الحالة الطبيعية.\r\n<br><br>\r\n\r\nلكن خلايا الجلد الميتة وخلايا الدم البيضاء لا تستطيع التساقط ​​بسرعة، ولذلك تتراكم في شكل طبقات قشريّة سميكة على سطح الجلد، هذه العملية يمكن وقفها على الغالب بواسطة العلاج.\r\n<br><br>\r\n\r\nليس واضحًا بالضبط ما هو السبب الذي يؤدي إلى اضطراب نشاط الخلايا اللمفاوية التائيّة عند مرضى الصدفية، فيما يعتقد الباحثون أن العوامل الوراثية والعوامل البيئية، على حد سوا', 'يمكن للطبيب تشخيص الصدفية عادةً بعد محادثة حول العلامات والأعراض وبعد فحص الجلد، لكن قد يكون من الضروري في بعض الأحيان أخذ عينة من الجلد وفحصها تحت المجهر من أجل تحديد النوع الدقيق من المرض ونفي غيره من الاضطرابات، تؤخذ خزعة الجلد عادةً في عيادة الطبيب تحت تخدير موضعي.\r\n<br><br>\r\nمن ضمن أبرز اضطرابات أخرى تشبه الصدفية:\r\n<br><br>\r\nالْتِهابُ الجِلْدِ المَثِّيّ (Seborrheic dermatitis).<br>\r\nحَزاز مُسَطـَّح (Lichen planus).<br>\r\nسَعْفَةُ الجَسَد (Tinea corporis).<br>\r\nالنُّخالِيَّةُ الوَرْدِيَّة (Pityriasis rosea).<br>', 'الأهداف المرجوة من علاج الصدفية:\n<br><br>\nوقف العملية التي تؤدي إلى إنتاج فائض من خلايا الجلد، مما يؤدي إلى تخفيف الالتهاب وتكوّن الطبقات.\nإزالة القشرة وجعل الجلد ناعمًا.<br>\nيمكن تقسيم أنواع علاج الصدفية المختلفة إلى ثلاث مجموعات: علاج الصدفية الموضعي، وعلاج الصدفية بالضوء، والمعالجة بتناول الأدوية الفموية', 'الصدفية.jpg', 1),
(10, 'البهاق - Vitiligo', 'هو مرض جلدي يحدث بسبب فقدان لون الجلد الطبيعي وظهور بقع بيضاء اللون يمكن أن تؤثر في الجلد أو في أي جزء من الجسم، وقد يؤثر أيضًا في الشعر وداخل الفم. كما تختلف الحالة من شخص لآخر، حيث لا يمكن التنبؤ بمعدل تأصر الجلد وفقدان اللون به، ولا يعد المرض معديًا؛ حيث يؤثر في جميع أنواع البشرة؛ لكن قد يكون أكثر وضوحًا في ذوي البشرة الداكنة.\r\n', 'العلامة الرئيسة له هو فقدان لون البشرة، وعادة على المناطق المعرضة لأشعة الشمس (مثل: اليدين والقدمين والذراعين والوجه والشفتين). كما تشمل على:<br>\r\nفقدان غير مكتمل من لون البشرة وظهور بقع بيضاء اللون.<br>\r\nظهور لون أبيض على فروة الرأس أو الرموش أو الحاجبين أو اللحية.<br>\r\nفقدان اللون في الأنسجة (الأغشية المخاطية) داخل الفم والأنف. <br>\r\nتغيير لون الطبقة الداخلية من مقلة العين (الشبكية).<br>\r\nتلون الأوعية الدموية تحت الجلد باللون الوردي.<br>\r\n', 'في جسم الإنسان يتم تحديد لون الشعر والجلد عن طريق مادة الميلانين، ويحدث البهاق عندما تموت الخلايا الصبغية التي تنتج الميلانين أو تتوقف عن العمل، وقد يرجع ذلك إلى مشكلة في الجهاز المناعي؛ لكن السبب لا يزال غير واضح. \r\n', 'الفحص السريري.<br>\r\nالتاريخ الطبي والعائلي.<br>\r\nالفحوص المخبرية: تحليل الدم.<br>\r\nاختبارات أخرى: أخذ عينة صغيرة (خزعة) من الجلد المصاب.<br>\r\n', 'يوجد العديد من الخيارات للعلاج البعض قد يستغرق طويلاً< لذا يجب مناقشتها مع الطبيب؛ حيث إن الهدف من معظم العلاجات هو استعادة لون الجلد المفقود والذي يشمل على:<br>\r\nأدوية موضعية على الجلد للمناطق الصغيرة: (مثل: الكورتيكوستيرويد). كما أن بعض هذه الأدوية لا ينبغي أن تستخدم على الوجه بسبب الآثار الجانبية المحتملة.<br>\r\nالعلاج بالضوء لاستعادة فقدان اللون على الجلد: يعمل بشكل أفضل على الوجه وقد يكون أقل فعالية على اليدين والقدمين.<br>\r\nالعلاج الضوئي (بوفا) ودواء السورالين لاستعادة لون البشرة: يمكن أن يطبق على الجلد أو يؤخذ حبوب عن طريق الفم.<br>\r\nالعملية الجراحية: تكون فقط للبالغين المصابين بالبهاق ولم يتغير (مستقر) لمدة 6 أشهر على الأقل.<br>\r\n', '1065459179_0_96_2049_1248_1920x0_80_0_0_85b59b7f8d7d39295ac1f36a2c71aae9.jpg', 1),
(11, '​ النخالة الوردية - Pityriasis rosea\r\n', 'هي حالة جلدية شائعة نسبيًّا تسبب طفحًا مؤقتًا على شكل بقع متقشرة حمراء على سطح الجلد، وغالبًا ما تكون البقعة الأولى من الطفح الجلدي عبارة عن رقعة بيضاوية كبيرة على الجلد، والتي يطلق عليها اسم (الطليعة)، وعادة ما تظهر بعد هذه البقعة بقع أصغر منها، تبدأ في الانتشار من البقعة نفسها على شكل أفرع شجرة الصنوبر، وغالبًا ما يختفي بمفرده.\r\n', '​الشعور بالتوعك لمدة يوم أو يومين قبل ظهور بقعة أو طفح جلدي كبير على جلدهم بأعراض تشبه أعراض الأنفلونزا مثل: التهاب الحلق، وقد يشعر المريض أيضًا بتورم في الغدد الليمفاوية في الرقبة.<br>\r\nظهور رقعة كبيرة على الجلد، وهي أول علامة للنخالة الوردية على الجلد (رقعة هيرالد)، وتكون وردية أو حمراء من الجلد المتقشر، ويراوح حجمها من 2 سم إلى 10 سم. كما يمكن أن تظهر على البطن، أو الصدر، أو الظهر، ومع ذلك يمكن أن يتطور في أي مكان على الجلد، بما في ذلك الإبط.<br>\r\nالرقعة في الأشخاص ذوي البشرة الفاتحة عادة حمراء اللون أو وردية. أما في الأشخاص ذوي البشرة الداكنة، يمكن أن تكون البقع أحيانًا رمادية، أو بنية داكنة، أو سوداء.<br>\r\n', 'ما زال السبب غير معروف؛ ولكن يُعتقد أن سبب الإصابة به ناتج عن عدوى فيروسية؛ حيث وجد أطباء الأمراض الجلدية فيروسات الهربس البشري في الطفح الجلدي، والدم، واللعاب لدى الأشخاص الذين يعانون النخالة الوردية، وهناك أنواع عدة من فيروسات الهربس البشري. كما وُجد أن الأنواع الموجودة في الأشخاص المصابين بالنخالة الوردية هي فيروسات الهربس البشري 6 و7، والتي لا يمكن لهذه الأنواع أن تسبب قروحًا أو هربسًا تناسليًّا.\r\n', 'في معظم الحالات، يمكن للطبيب التعرف على النخالة الوردية بمجرد النظر إلى الطفح الجلدي؛ ولكن يقوم بأخذ مسحة للطفح أو يطلب إجراء فحص دم استبعاد أي حالات مشابهة للنخالية الوردية مثل السعفة. كما يمكن أن تسبب بعض الأدوية طفحًا جلديًّا يشبه النخالة الوردية؛ لذا من المهم استبعاد ذلك.\r\n', 'عادة ما تزول النخالة الوردية في غضون 6 إلى 8 أسابيع؛ ولكن يمكن أن تستمر إلى ٥ أشهر، ولا حاجة للعلاج ما لم تكن هناك حكة أو تعب، وقد يتضمن العلاج ما يلي:<br>\r\n​علاجات لتقليل حكة الجلد، وتتم بواسطة وإشراف الطبيب، وتكون غسولاً أو كريمًا مضادًا للحكة، مثل كريم الهيدروكورتيزون، بالإضافة إلى مضادات الهيستامين.   <br>\r\nالعلاج بالضوء فوق البنفسجي (يتم تقديمها في عيادة طبيب الأمراض الجلدية).<br>\r\nأما بالنسبة للبقع الداكنة بمجرد اختفاء الطفح الجلدي تظهر بقع داكنة اللون، خاصة عند ذوي البشرة الداكنة، والتي عادة ما تختفي من تلقاء نفسها في غضون من 6 إلى 12 شهرًا.<br>\r\n', 'مرض-جلدي-الوردية.jpg', 1),
(12, 'الاكزيما - Atopic dermatitis\r\n', 'هي مسمى عام لبعض أنواع الحساسية التي تصيب الجلد بعضها بسبب عوامل وراثية والآخر مكتسب، تتراوح أعراضها بين الجفاف الجلدي إلى الاحمرار، وتكون فقاقيع مائية صغيرة وقشور مصاحبة بحكة شديدة، وتأتي بصور متنوعة وتختلف من شخص لآخر.\r\n', 'تتراوح شدة الاكزيما من بسيطة إلى شديدة، وتختلف اختلافًا كبيرًا من شخص لآخر، وأهم الأعراض:<br>\r\nأن يكون الجلد جافًا وحساسًا.<br>\r\nاحمرار وتهيج الجلد.<br>\r\nحكة شديدة.<br>\r\nتغير لون الجلد.<br>\r\nظهور بقع خشنة أو قشور على الجلد.<br>\r\nتورم بعض المناطق.<br>\r\nقد تظهر جميع هذه الأعراض أو بعضها وتختفي تمامًا بعد فترة، وينصح بزيارة الطبيب للتأكد من كونها اكزيما أم لا.<br>\r\n\r\n', 'السبب الدقيق للاكزيما غير معروف، لكن يعتقد الأطباء أنه مزيج من العوامل الوراثية والبيئية.<br>\r\nالمصابون بالاكزيما قد يكون لديهم خلل في الجين المسؤول عن تكوين البروتين الذي يسهم في بناء طبقة حامية للجلد، فعندما لا تتكون منه كمية كافية تتلاشى رطوبة الجلد وتدخل البكتيريا، لذلك يكون جلد المصابين شديد الجفاف وأكثر عرضة للعدوى.\r\n', 'من المرجح أن يقوم الطبيب بإجراء تشخيص عن طريق فحص البشرة ومراجعة التاريخ الطبي.<br>\r\nقد يستخدم اختبار البقعة أو اختبارات أخرى لاستبعاد الأمراض الجلدية الأخرى أو تحديد الظروف التي تصاحب الاكزيما.\r\n', 'إن معرفة نوع الاكزيما ومهيجاتها هي أفضل وسيلة لبدء العلاج والتحكم بها لكي لا تعوق الحياة الطبيعية، وقد تتطلب المحاولات لتجربة وسائل مختلفة عدة أشهر أو سنوات، ومع ذلك فحتى في حالة الاستجابة للعلاج قد تظهر العلامات والأعراض.<br><br>\r\n\r\nإذا لم تكفِ خطوات الترطيب العادية وغيرها من العناية الذاتية فقد يوصي الطبيب باستخدام أحد العلاجات والأدوية التالية:<br>\r\nالكريمات التي تسيطر على الحكة والالتهابات.<br>\r\nأدوية مكافحة العدوى (مثل مراهم المضادات الحيوية).<br>\r\nالعقاقير المضادة للحكة عن طريق الفم.<br>\r\n', 'tbl_diseases_disease_75_3626f70ba35-0e23-4d27-afcc-978dee272546.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(1200) NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `messageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `header` varchar(250) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `patientId` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('user','doctor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Mnyrah Aldossri', 'mnyrah@gmail.com', 'asdasd', 'doctor'),
(5, 'admin', 'admin@gmail.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`doctorId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor` (`fromId`),
  ADD KEY `patient` (`toId`),
  ADD KEY `message` (`messageId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor1` (`doctorId`),
  ADD KEY `patient1` (`patientId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `user` FOREIGN KEY (`doctorId`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `doctor` FOREIGN KEY (`fromId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message` FOREIGN KEY (`messageId`) REFERENCES `message` (`id`),
  ADD CONSTRAINT `patient` FOREIGN KEY (`toId`) REFERENCES `user` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `doctor1` FOREIGN KEY (`doctorId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `patient1` FOREIGN KEY (`patientId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
