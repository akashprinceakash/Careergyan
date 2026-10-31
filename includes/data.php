<?php
/**
 * Content and data access.
 *
 * Static content (countries, services, offices…) lives here because the
 * current database has no tables for it. DB-backed content (blog, events,
 * e_books, country, courses, all_university) is read live when connected and
 * falls back to the mock rows below.
 */

const CG_PHONE = '+91 96068 68888';
const CG_PHONE_RAW = '+919606868888';
const CG_EMAIL = 'enquiry@careergyan.co';
const CG_WHATSAPP = '919606868888';
const CG_RECAPTCHA_SITEKEY = '6LfsHSkrAAAAAODOrrF-5_k_Av2g8t3myljtf4Gl';

// ---------- Countries ----------
// file = existing URL on the live site, so links and SEO stay intact
$CG_COUNTRIES = [
    'uk' => [
        'name' => 'United Kingdom', 'short' => 'UK', 'file' => 'study-in-uk.php', 'flag' => 'uk.png', 'img' => 'photos/country/uk.jpg',
        'region' => 'popular', 'tagline' => 'One-year master’s at globally ranked universities',
        'intro' => 'The UK offers shorter degrees, a two-year Graduate Route work visa and universities that consistently rank among the world’s best. Most master’s programmes finish in 12 months, which keeps total cost down.',
        'tuition' => '£15,000 – £28,000', 'living' => '£12,000 / yr', 'psw' => '2 years (Graduate Route)', 'intakes' => 'January, September', 'test' => 'IELTS 6.5 / PTE 58',
        'unis' => ['University of Oxford', 'Imperial College London', 'University of Manchester', 'University of Leeds', 'University of Birmingham', 'University of Glasgow'],
        'courses' => ['Business & Management', 'Data Science', 'Computer Science', 'Finance', 'Engineering'],
    ],
    'usa' => [
        'name' => 'United States', 'short' => 'USA', 'file' => 'study-in-usa.php', 'flag' => 'usa.png', 'img' => 'photos/country/usa.jpg',
        'region' => 'popular', 'tagline' => 'Research, funding and up to 3 years of STEM OPT',
        'intro' => 'The USA has the widest choice of universities and programmes in the world. STEM graduates can work for up to three years on OPT, and assistantships can offset a large share of tuition.',
        'tuition' => '$25,000 – $55,000', 'living' => '$15,000 / yr', 'psw' => 'Up to 3 years (STEM OPT)', 'intakes' => 'Fall (Aug), Spring (Jan)', 'test' => 'IELTS 6.5 / TOEFL 80, GRE optional',
        'unis' => ['Arizona State University', 'Northeastern University', 'University of Texas at Dallas', 'Purdue University', 'University of Illinois Chicago', 'Stevens Institute of Technology'],
        'courses' => ['Computer Science', 'Data Analytics', 'MBA', 'Engineering Management', 'Biotechnology'],
    ],
    'canada' => [
        'name' => 'Canada', 'short' => 'Canada', 'file' => 'study-in-canada.php', 'flag' => 'canada.svg', 'img' => 'photos/country/canada.jpg',
        'region' => 'popular', 'tagline' => 'Co-op programmes and a clear path to permanent residence',
        'intro' => 'Canada combines affordable public colleges and universities with paid co-op placements and a post-graduation work permit of up to three years, which many students use as a route to PR.',
        'tuition' => 'C$18,000 – C$35,000', 'living' => 'C$20,635 / yr (GIC)', 'psw' => 'Up to 3 years (PGWP)', 'intakes' => 'January, May, September', 'test' => 'IELTS 6.5',
        'unis' => ['University of Toronto', 'University of British Columbia', 'University of Waterloo', 'McGill University', 'University of Alberta', 'Humber College'],
        'courses' => ['Computer Science', 'Project Management', 'Supply Chain', 'Healthcare', 'Business Analytics'],
    ],
    'germany' => [
        'name' => 'Germany', 'short' => 'Germany', 'file' => 'study-in-germany.php', 'flag' => 'germany.png', 'img' => 'photos/country/germany.jpg',
        'region' => 'popular europe low-cost', 'tagline' => 'Public universities with little or no tuition',
        'intro' => 'Germany’s public universities charge little or no tuition, even for international students. Strong engineering and research programmes, 18 months of post-study work rights and the new Opportunity Card make it a top choice.',
        'tuition' => '€0 – €3,000 (public)', 'living' => '€11,904 / yr (blocked account)', 'psw' => '18 months', 'intakes' => 'Winter (Oct), Summer (Apr)', 'test' => 'IELTS 6.5 or German B2/C1',
        'unis' => ['Technical University of Munich', 'RWTH Aachen University', 'TU Berlin', 'University of Stuttgart', 'TU Chemnitz', 'Karlsruhe Institute of Technology'],
        'courses' => ['Mechanical Engineering', 'Automotive Engineering', 'Computer Science', 'Data Science', 'Renewable Energy'],
    ],
    'ireland' => [
        'name' => 'Ireland', 'short' => 'Ireland', 'file' => 'study-in-ireland.php', 'flag' => 'ireland.png', 'img' => 'photos/country/ireland.jpg',
        'region' => 'popular europe', 'tagline' => 'Europe’s tech hub, English-speaking',
        'intro' => 'Ireland hosts the European headquarters of Google, Meta, Apple and many pharma companies. One-year master’s programmes and a two-year Stamp 1G visa make it efficient and job-focused.',
        'tuition' => '€10,000 – €25,000', 'living' => '€10,000 / yr', 'psw' => '2 years (Stamp 1G)', 'intakes' => 'September, January', 'test' => 'IELTS 6.5',
        'unis' => ['Trinity College Dublin', 'University College Dublin', 'University College Cork', 'University of Galway', 'Dublin City University', 'University of Limerick'],
        'courses' => ['Data Analytics', 'Computer Science', 'Pharmaceutical Science', 'Finance', 'Business Analytics'],
    ],
    'australia' => [
        'name' => 'Australia', 'short' => 'Australia', 'file' => 'study-in-australia.php', 'flag' => 'australia.png', 'img' => 'photos/country/australia.jpg',
        'region' => 'popular', 'tagline' => 'Post-study work rights and a strong job market',
        'intro' => 'Australia offers globally ranked universities, a high quality of life and two to four years of post-study work rights depending on your qualification and city.',
        'tuition' => 'A$30,000 – A$45,000', 'living' => 'A$29,710 / yr', 'psw' => '2 – 4 years', 'intakes' => 'February, July', 'test' => 'IELTS 6.5 / PTE 58',
        'unis' => ['University of Melbourne', 'University of Sydney', 'Monash University', 'UNSW Sydney', 'University of Queensland', 'Deakin University'],
        'courses' => ['Nursing', 'IT', 'Accounting', 'Engineering', 'Public Health'],
    ],
    'new-zealand' => [
        'name' => 'New Zealand', 'short' => 'New Zealand', 'file' => 'study-in-new-zealand.php', 'flag' => 'newzeland.png', 'img' => 'banners/campus.jpg',
        'region' => 'popular', 'tagline' => 'Safe, welcoming and work-friendly',
        'intro' => 'New Zealand’s eight universities are all ranked globally. Students can work 20 hours a week during term and up to three years after graduating.',
        'tuition' => 'NZ$25,000 – NZ$40,000', 'living' => 'NZ$20,000 / yr', 'psw' => 'Up to 3 years', 'intakes' => 'February, July', 'test' => 'IELTS 6.5',
        'unis' => ['University of Auckland', 'University of Otago', 'Victoria University of Wellington', 'University of Canterbury', 'Massey University', 'AUT'],
        'courses' => ['IT', 'Agriculture', 'Engineering', 'Business', 'Hospitality'],
    ],
    'france' => [
        'name' => 'France', 'short' => 'France', 'file' => 'study-in-france.php', 'flag' => 'france.png', 'img' => 'photos/country/france.jpg',
        'region' => 'europe', 'tagline' => 'World-class business and design schools',
        'intro' => 'France is home to top-ranked business schools and low-fee public universities, with many programmes taught entirely in English and a two-year APS work permit after graduation.',
        'tuition' => '€3,000 – €18,000', 'living' => '€9,000 / yr', 'psw' => '2 years (APS)', 'intakes' => 'September, January', 'test' => 'IELTS 6.0 – 6.5',
        'unis' => ['HEC Paris', 'ESSEC Business School', 'Sorbonne University', 'NEOMA Business School', 'SKEMA Business School', 'Université Paris-Saclay'],
        'courses' => ['MBA', 'Luxury Management', 'Finance', 'Fashion & Design', 'Hospitality'],
    ],
    'italy' => [
        'name' => 'Italy', 'short' => 'Italy', 'file' => 'study-in-italy.php', 'flag' => 'italy.png', 'img' => 'photos/country/italy.jpg',
        'region' => 'europe low-cost', 'tagline' => 'Affordable degrees and generous scholarships',
        'intro' => 'Italian public universities charge income-based fees, and regional scholarships such as DSU can cover tuition, housing and meals for eligible students.',
        'tuition' => '€1,000 – €4,000', 'living' => '€8,000 / yr', 'psw' => '12 months', 'intakes' => 'September', 'test' => 'IELTS 6.0',
        'unis' => ['Politecnico di Milano', 'University of Bologna', 'Sapienza University of Rome', 'University of Padua', 'Politecnico di Torino', 'University of Milan'],
        'courses' => ['Architecture', 'Design', 'Medicine (English)', 'Engineering', 'Economics'],
    ],
    'netherlands' => [
        'name' => 'Netherlands', 'short' => 'Netherlands', 'file' => 'study-in-netherlands.php', 'flag' => 'netherlands.png', 'img' => 'photos/country/netherlands.jpg',
        'region' => 'europe', 'tagline' => 'English-taught programmes and applied research',
        'intro' => 'The Netherlands has more than 2,000 English-taught programmes and an interactive teaching style. Graduates can stay for a year on the orientation visa to find work.',
        'tuition' => '€8,000 – €20,000', 'living' => '€12,000 / yr', 'psw' => '1 year (Orientation Year)', 'intakes' => 'September, February', 'test' => 'IELTS 6.5',
        'unis' => ['University of Amsterdam', 'Delft University of Technology', 'Erasmus University Rotterdam', 'Leiden University', 'Eindhoven University of Technology', 'Utrecht University'],
        'courses' => ['Business', 'Engineering', 'Logistics', 'Psychology', 'Computer Science'],
    ],
    'sweden' => [
        'name' => 'Sweden', 'short' => 'Sweden', 'file' => 'study-in-sweden.php', 'flag' => 'sweden.png', 'img' => 'photos/country/sweden.jpg',
        'region' => 'europe', 'tagline' => 'Innovation, sustainability and research',
        'intro' => 'Sweden is known for innovation, sustainability research and a flat, student-centred teaching culture, with 12 months to look for work after graduating.',
        'tuition' => 'SEK 80,000 – 150,000', 'living' => 'SEK 120,000 / yr', 'psw' => '12 months', 'intakes' => 'August, January', 'test' => 'IELTS 6.5',
        'unis' => ['KTH Royal Institute of Technology', 'Lund University', 'Uppsala University', 'Chalmers University of Technology', 'Stockholm University', 'Linköping University'],
        'courses' => ['Sustainable Engineering', 'Computer Science', 'Life Sciences', 'Design', 'Business'],
    ],
    'finland' => [
        'name' => 'Finland', 'short' => 'Finland', 'file' => 'study-in-finland.php', 'flag' => 'finland.png', 'img' => 'banners/library.jpg',
        'region' => 'europe', 'tagline' => 'A world-leading education system',
        'intro' => 'Finland’s universities focus on practical research and close industry links. Generous scholarships and a two-year job-seeker permit make it an attractive option.',
        'tuition' => '€6,000 – €18,000', 'living' => '€9,000 / yr', 'psw' => '2 years', 'intakes' => 'August, January', 'test' => 'IELTS 6.5',
        'unis' => ['University of Helsinki', 'Aalto University', 'Tampere University', 'University of Turku', 'University of Oulu', 'LUT University'],
        'courses' => ['Education', 'Game Design', 'Computer Science', 'Environmental Science', 'Business'],
    ],
    'poland' => [
        'name' => 'Poland', 'short' => 'Poland', 'file' => 'study-in-poland.php', 'flag' => 'poland.png', 'img' => 'photos/country/poland.jpg',
        'region' => 'europe low-cost', 'tagline' => 'Medicine and engineering at a low cost',
        'intro' => 'Poland offers EU-recognised degrees at a fraction of Western European costs, especially for English-taught medicine and engineering.',
        'tuition' => '€2,000 – €6,000', 'living' => '€5,000 / yr', 'psw' => '9 months', 'intakes' => 'October, February', 'test' => 'IELTS 5.5 – 6.0',
        'unis' => ['University of Warsaw', 'Jagiellonian University', 'Warsaw University of Technology', 'Medical University of Gdańsk', 'Wrocław University of Science and Technology', 'Poznań University of Medical Sciences'],
        'courses' => ['MBBS', 'Engineering', 'Computer Science', 'Business', 'Dentistry'],
    ],
    'hungary' => [
        'name' => 'Hungary', 'short' => 'Hungary', 'file' => 'study-in-hungary.php', 'flag' => 'hungary.png', 'img' => 'banners/graduation.jpg',
        'region' => 'europe low-cost', 'tagline' => 'English-taught MBBS in the heart of Europe',
        'intro' => 'Hungary is a popular choice for English-taught medicine recognised across the EU, plus the Stipendium Hungaricum scholarship for many programmes.',
        'tuition' => '€5,000 – €17,000', 'living' => '€6,000 / yr', 'psw' => '9 months', 'intakes' => 'September, February', 'test' => 'IELTS 6.0',
        'unis' => ['Semmelweis University', 'University of Debrecen', 'University of Szeged', 'University of Pécs', 'Budapest University of Technology', 'Corvinus University'],
        'courses' => ['MBBS', 'Dentistry', 'Pharmacy', 'Engineering', 'Business'],
    ],
    'romania' => [
        'name' => 'Romania', 'short' => 'Romania', 'file' => 'study-in-romania.php', 'flag' => 'romania.png', 'img' => 'banners/study-group.jpg',
        'region' => 'europe low-cost', 'tagline' => 'EU-recognised medical degrees',
        'intro' => 'Romania offers six-year English-taught medical degrees recognised across the EU and by the NMC, with low living costs.',
        'tuition' => '€3,000 – €7,500', 'living' => '€4,500 / yr', 'psw' => '9 months', 'intakes' => 'October', 'test' => 'IELTS 6.0',
        'unis' => ['Carol Davila University of Medicine', 'Iuliu Hațieganu University', 'Grigore T. Popa University', 'University of Bucharest', 'Victor Babeș University', 'Ovidius University'],
        'courses' => ['MBBS', 'Dentistry', 'Pharmacy', 'Engineering', 'IT'],
    ],
    'latvia' => [
        'name' => 'Latvia', 'short' => 'Latvia', 'file' => 'study-in-latvia.php', 'flag' => 'latvia.png', 'img' => 'photos/country/latvia.jpg',
        'region' => 'europe low-cost', 'tagline' => 'Affordable EU study with simple admission',
        'intro' => 'Latvia offers affordable Schengen-area degrees, simple admission requirements and the right to work 20 hours a week while studying.',
        'tuition' => '€2,500 – €6,000', 'living' => '€5,000 / yr', 'psw' => '6 months', 'intakes' => 'September, February', 'test' => 'IELTS 5.5',
        'unis' => ['Riga Technical University', 'University of Latvia', 'Riga Stradiņš University', 'Turiba University', 'RISEBA University', 'Transport and Telecommunication Institute'],
        'courses' => ['Business', 'Computer Science', 'Aviation', 'Medicine', 'Hospitality'],
    ],
    'lithuania' => [
        'name' => 'Lithuania', 'short' => 'Lithuania', 'file' => 'study-in-lithuania.php', 'flag' => 'lithuania.png', 'img' => 'photos/country/lithuania.jpg',
        'region' => 'europe low-cost', 'tagline' => 'A fast-growing tech and fintech economy',
        'intro' => 'Lithuania’s growing tech and fintech sector, low costs and English-taught programmes make it a smart EU entry point.',
        'tuition' => '€2,500 – €5,000', 'living' => '€5,000 / yr', 'psw' => '12 months', 'intakes' => 'September', 'test' => 'IELTS 5.5 – 6.0',
        'unis' => ['Vilnius University', 'Kaunas University of Technology', 'Vilnius Gediminas Technical University', 'Vytautas Magnus University', 'ISM University', 'Mykolas Romeris University'],
        'courses' => ['IT', 'Fintech', 'Engineering', 'Business', 'Medicine'],
    ],
    'spain' => [
        'name' => 'Spain', 'short' => 'Spain', 'file' => 'study-in-spain.php', 'flag' => 'spain.svg', 'img' => 'banners/friends-paris.jpg',
        'region' => 'europe', 'tagline' => 'Leading business schools and a relaxed lifestyle',
        'intro' => 'Spain is home to some of Europe’s best-known business schools, sunny cities with modest living costs and a 12-month job-search visa after graduating.',
        'tuition' => '€3,000 – €20,000', 'living' => '€8,000 / yr', 'psw' => '12 months', 'intakes' => 'September, January', 'test' => 'IELTS 6.0 – 6.5',
        'unis' => ['IE University', 'ESADE Business School', 'University of Barcelona', 'Autonomous University of Madrid', 'EU Business School', 'Pompeu Fabra University'],
        'courses' => ['MBA', 'Tourism & Hospitality', 'Marketing', 'Finance', 'International Relations'],
    ],
    'malaysia' => [
        'name' => 'Malaysia', 'short' => 'Malaysia', 'file' => 'study-in-malaysia.php', 'flag' => 'malaysia.svg', 'img' => 'banners/campus-2.jpg',
        'region' => 'low-cost', 'tagline' => 'UK and Australian degrees at Asian prices',
        'intro' => 'Malaysia hosts branch campuses of UK and Australian universities, so you can earn the same degree at a much lower cost, close to home.',
        'tuition' => 'RM 25,000 – RM 50,000', 'living' => 'RM 18,000 / yr', 'psw' => 'Varies by programme', 'intakes' => 'February, July, September', 'test' => 'IELTS 5.5 – 6.0',
        'unis' => ['University of Malaya', 'Monash University Malaysia', 'University of Nottingham Malaysia', 'Taylor’s University', 'Sunway University', 'Heriot-Watt University Malaysia'],
        'courses' => ['Business', 'Engineering', 'IT', 'Hospitality', 'Medicine'],
    ],
];

function cg_countries()
{
    global $CG_COUNTRIES;
    return $CG_COUNTRIES;
}

function cg_country($slug)
{
    global $CG_COUNTRIES;
    return $CG_COUNTRIES[$slug] ?? null;
}

/** Country names for selects: DB `country` table when live, otherwise our list. */
function cg_country_titles()
{
    $rows = cg_query('SELECT country_title FROM country ORDER BY country_title ASC');
    if ($rows) {
        return array_column($rows, 'country_title');
    }
    $names = array_column(cg_countries(), 'name');
    sort($names);
    return $names;
}

// ---------- Courses ----------
$CG_COURSES = [
    ['title' => 'Engineering', 'img' => 'courses/engineering.png', 'note' => 'Germany, USA, Ireland'],
    ['title' => 'Management', 'img' => 'courses/management.png', 'note' => 'UK, France, Ireland'],
    ['title' => 'Medicine', 'img' => 'courses/mbbs.png', 'note' => 'Hungary, Poland, Romania'],
    ['title' => 'Science', 'img' => 'courses/science.png', 'note' => 'USA, UK, Sweden'],
    ['title' => 'Arts', 'img' => 'courses/arts.png', 'note' => 'UK, Italy, Netherlands'],
];

function cg_course_titles()
{
    $rows = cg_query('SELECT courses_title FROM courses ORDER BY courses_title ASC');
    if ($rows) {
        return array_column($rows, 'courses_title');
    }
    return ['Arts', 'Engineering', 'Hospitality', 'Management', 'Medicine', 'Nursing', 'Pharmacy', 'Science', 'Technology'];
}

// ---------- Services ----------
$CG_SERVICES = [
    ['icon' => 'compass', 'title' => 'Career counselling', 'img' => 'photos/fair/fair-3.jpg', 'text' => 'One-to-one sessions to match your profile, budget and goals with the right course and country.',
        'points' => ['Profile evaluation within 48 hours', 'Country and course comparison', 'Honest admit chances']],
    ['icon' => 'list', 'title' => 'University shortlisting', 'img' => 'photos/library-study.jpg', 'text' => 'A balanced list of dream, target and safe universities from our 2,500+ partners.',
        'points' => ['6–10 universities per student', 'Fee waivers at partner universities', 'Scholarship matching']],
    ['icon' => 'pen', 'title' => 'SOP, LOR & applications', 'img' => 'photos/study.jpg', 'text' => 'Documents drafted with you, reviewed by editors and submitted before every deadline.',
        'points' => ['SOP and essay editing', 'LOR and CV guidance', 'Deadline tracking for every application']],
    ['icon' => 'passport', 'title' => 'Visa assistance', 'img' => 'banners/plane.jpg', 'text' => 'File preparation, appointment booking and mock interviews with a 95% approval rate.',
        'points' => ['Document checklist and review', 'Appointment booking', 'Mock visa interviews']],
    ['icon' => 'bank', 'title' => 'Education loans', 'img' => 'photos/advisor.jpg', 'text' => 'Collateral and non-collateral loans through Avanse, QuickLoans and partner banks.',
        'points' => ['Loan comparison and paperwork', 'Blocked accounts for Germany', 'Forex at better rates']],
    ['icon' => 'home', 'title' => 'Accommodation & travel', 'img' => 'photos/housing.jpg', 'text' => 'Verified housing near campus, forex, flights and a pre-departure briefing.',
        'points' => ['Verified student housing', 'Flights and travel insurance', 'Pre-departure briefing']],
];

// ---------- Process ----------
$CG_STEPS = [
    ['title' => 'Free counselling', 'text' => 'Discuss your grades, budget and goals with a senior counsellor.'],
    ['title' => 'Shortlist universities', 'text' => 'Get 6–10 universities matched to your profile and budget.'],
    ['title' => 'Apply with confidence', 'text' => 'SOPs, LORs and applications prepared and submitted on time.'],
    ['title' => 'Visa & funding', 'text' => 'Visa filing, mock interviews and education loan support.'],
    ['title' => 'Fly & settle in', 'text' => 'Housing, forex and a pre-departure briefing before you go.'],
];

// ---------- Testimonials (placeholder: replace with real student quotes) ----------
$CG_STORIES = [
    ['name' => 'Rahul Kumar', 'course' => 'MSc Automotive Software', 'uni' => 'TU Chemnitz, Germany', 'photo' => 'photos/fair/fair-1.jpg', 'highlights' => ['TU Chemnitz'], 'quote' => 'They told me which German universities I actually had a shot at instead of selling me a dream. I got into TU Chemnitz in the first round.'],
    ['name' => 'Ananya Sharma', 'course' => 'MSc Data Science', 'uni' => 'University of Leeds, UK', 'photo' => 'photos/fair/fair-5.jpg', 'highlights' => ['four drafts'], 'quote' => 'My SOP went through four drafts with my counsellor. The visa interview prep was the part I feared most, and it turned out to be the easiest.'],
    ['name' => 'Mohammed Faiz', 'course' => 'MBA', 'uni' => 'Dublin Business School, Ireland', 'photo' => 'photos/fair/fair-4.jpg', 'highlights' => ['before I booked my flight'], 'quote' => 'Loan, forex and a room near campus were all arranged before I booked my flight. My parents stopped worrying after week two.'],
    ['name' => 'Priya Menon', 'course' => 'MSc Business Analytics', 'uni' => 'University College Cork, Ireland', 'photo' => 'photos/fair/fair-7.jpg', 'highlights' => ['three weeks'], 'quote' => 'I had a gap year and thought Ireland was out of reach. They found a programme that valued my work experience and my visa came through in three weeks.'],
    ['name' => 'Karthik Rao', 'course' => 'MS Computer Science', 'uni' => 'Arizona State University, USA', 'photo' => 'photos/fair/fair-2.jpg', 'highlights' => ['F-1 visa'], 'quote' => 'The mock interviews were tougher than the real thing. I walked into my F-1 visa interview calm and walked out approved.'],
    ['name' => 'Sneha Patil', 'course' => 'MSc Nursing', 'uni' => 'Deakin University, Australia', 'photo' => 'photos/fair/fair-3.jpg', 'highlights' => ['Career Gyan'], 'quote' => 'Career Gyan compared three Australian universities for me on fees, placements and city costs. Choosing became easy.'],
    ['name' => 'Arjun Nair', 'course' => 'MSc Mechanical Engineering', 'uni' => 'RWTH Aachen, Germany', 'photo' => 'photos/fair/fair-6.jpg', 'highlights' => ['blocked account'], 'quote' => 'From uni-assist to my blocked account and a room in Aachen, every step had a checklist. Nothing was left to guesswork.'],
    ['name' => 'Fatima Sheikh', 'course' => 'MSc Marketing', 'uni' => 'University of Manchester, UK', 'photo' => 'photos/study.jpg', 'highlights' => ['January intake'], 'quote' => 'I missed September and thought I had lost a year. They moved me to the January intake with a scholarship I didn’t know existed.'],
];

// ---------- Offices ----------
$CG_OFFICES = [
    ['city' => 'Bangalore CBD', 'tag' => 'Head office', 'addr' => '#19, G-2, Brigade Gardens, Church Street, Bangalore 560001', 'phone' => '+91 96068 68888', 'email' => 'enquiry@careergyan.co', 'page' => 'abroad-education-consultants-in-bangalore.php'],
    ['city' => 'Bangalore North', 'tag' => 'Kalyan Nagar', 'addr' => '#208, 8th B Main Road, 2nd Cross, HRBR Layout, Kalyan Nagar, Bangalore 560043', 'phone' => '+91 96068 68888', 'email' => 'enquiry@careergyan.co', 'page' => 'abroad-education-consultants-in-bangalore.php'],
    ['city' => 'Hyderabad', 'tag' => 'Gachibowli', 'addr' => 'Lorven Smart Spaces, 2nd Floor, Vaishnavi’s Cynosure, Telecom Nagar Extn, Gachibowli, Hyderabad 500032', 'phone' => '+91 90716 63366', 'email' => 'hyderabad@careergyan.co', 'page' => 'abroad-education-consultants-in-hyderabad.php'],
    ['city' => 'Pune', 'tag' => 'Chinchwad', 'addr' => 'Office 214, Kamala Corner, 1st Floor, near Morya Hospital, Chinchwad, Pune 411033', 'phone' => '+91 98226 32911', 'email' => 'pune@careergyan.co', 'page' => 'abroad-education-consultants-in-pune.php'],
    ['city' => 'Bahrain', 'tag' => 'International', 'addr' => 'Office 5, Al Waine BDSME, 5th Floor, ABC Mall, Juffair, Kingdom of Bahrain', 'phone' => '+973 3468 2212', 'email' => 'enquiry@careergyan.co', 'page' => 'abroad-education-consultants-in-bahrain.php'],
    ['city' => 'Germany', 'tag' => 'International', 'addr' => 'Kreuzäckerstrasse 26, 70794 Filderstadt, Germany', 'phone' => '', 'email' => 'enquiry@careergyan.co', 'page' => 'contact.php'],
];

// ---------- Blog ----------
$CG_MOCK_BLOG = [
    ['id' => 41, 'title' => 'How to choose the right study abroad consultant', 'slug' => 'how-to-choose-the-right-study-abroad-consultant', 'front_image' => 'assets/img/blog/blog-1.jpg', 'date' => '2026-10-14',
        'excerpt' => 'Seven questions to ask before you sign with anyone: placement records, university tie-ups, fee transparency and what happens after your visa.',
        'description' => '<p>Choosing a consultant is the first big decision of your study abroad journey. A good one saves you months; a poor one can cost you an intake.</p><h2>1. Ask for verified outcomes</h2><p>Look for admits and visas from the last two intakes, not a lifetime total. Ask which universities and courses those students went to.</p><h2>2. Check accreditations</h2><p>ICEF, NAFSA and EAIE memberships mean a consultant has been vetted by international education bodies.</p><h2>3. Understand the fees</h2><p>Ask for every fee in writing before you start. Free counselling should stay free.</p><h2>4. Meet the person who will handle your file</h2><p>The counsellor you meet should be the one who stays with you through visas.</p>'],
    ['id' => 40, 'title' => 'Germany’s Opportunity Card, explained in points', 'slug' => 'germany-opportunity-card-points', 'front_image' => 'assets/img/blog/blog-2.jpg', 'date' => '2026-09-28',
        'excerpt' => 'Who qualifies, how the six-point threshold works and what to prepare before you apply for the Chancenkarte.',
        'description' => '<p>The Chancenkarte lets skilled workers enter Germany for up to a year to look for a job. You need a recognised qualification and at least six points.</p><h2>How points are awarded</h2><p>Points come from qualification recognition, work experience, German and English skills, age, previous stays in Germany and a partner who also qualifies.</p><h2>What to prepare</h2><p>Degree recognition (anabin or ZAB), proof of funds of about €1,091 a month, and language certificates.</p>'],
    ['id' => 39, 'title' => 'The future-proof degree: what to study for jobs in 2030', 'slug' => 'future-proof-degree', 'front_image' => 'assets/img/blog/blog-3.jpg', 'date' => '2026-09-02',
        'excerpt' => 'Data science, renewable energy and healthcare management: where demand is growing and which countries teach these best.',
        'description' => '<p>Employers abroad are hiring hardest in data, energy transition and healthcare. Here is where to study each.</p><h2>Data science</h2><p>Ireland, the UK and the USA offer strong one- and two-year programmes with tech hiring nearby.</p><h2>Renewable energy</h2><p>Germany, Sweden and the Netherlands lead in research and industry placements.</p>'],
    ['id' => 38, 'title' => 'Survival tips for your first month abroad', 'slug' => 'survival-tips-international-students', 'front_image' => 'assets/img/photos/study.jpg', 'date' => '2026-08-11',
        'excerpt' => 'Bank accounts, SIM cards, residence permits and finding Indian groceries, in the order you will need them.',
        'description' => '<p>Your first four weeks set the tone for the year. Here is what to do, in order.</p><h2>Week one</h2><p>Register your address, open a bank account and get a local SIM.</p><h2>Week two</h2><p>Book your residence permit appointment and join student groups.</p>'],
    ['id' => 37, 'title' => 'Education loans without collateral: what banks look for', 'slug' => 'education-loans-without-collateral', 'front_image' => 'assets/img/photos/advisor.jpg', 'date' => '2026-07-22',
        'excerpt' => 'Your university, course and co-applicant income matter more than you think. Here is how lenders decide.',
        'description' => '<p>Non-collateral loans are approved mainly on the strength of your admit and your co-applicant’s income.</p>'],
    ['id' => 36, 'title' => 'UK January intake: is it as good as September?', 'slug' => 'uk-january-intake', 'front_image' => 'assets/img/banners/london.jpg', 'date' => '2026-07-04',
        'excerpt' => 'Fewer courses, but less competition and the same Graduate Route visa. Who should choose January.',
        'description' => '<p>January intakes offer fewer programmes but often faster decisions and the same post-study work rights.</p>'],
];

function cg_blogs($limit = 6, $offset = 0)
{
    if (cg_live()) {
        return cg_query('SELECT id, title, slug, excerpt, front_image, date FROM blog ORDER BY id DESC LIMIT ' . (int) $limit . ' OFFSET ' . (int) $offset);
    }
    global $CG_MOCK_BLOG;
    return array_slice($CG_MOCK_BLOG, $offset, $limit);
}

function cg_blog_count()
{
    if (cg_live()) {
        $r = cg_query('SELECT COUNT(*) AS n FROM blog');
        return (int) ($r[0]['n'] ?? 0);
    }
    global $CG_MOCK_BLOG;
    return count($CG_MOCK_BLOG);
}

function cg_blog($slug)
{
    if (cg_live()) {
        $r = cg_query('SELECT * FROM blog WHERE slug = ? LIMIT 1', [$slug]);
        return $r[0] ?? null;
    }
    global $CG_MOCK_BLOG;
    foreach ($CG_MOCK_BLOG as $b) {
        if ($b['slug'] === $slug) {
            return $b;
        }
    }
    return null;
}

// ---------- Events ----------
$CG_MOCK_EVENTS = [
    ['id' => 22, 'event_title' => 'Global Education Fair 2026', 'slug' => 'global-education-fair-2026', 'event_datetime' => '2026-11-15 10:00:00', 'event_location' => 'Hotel Lalit Ashok, Bangalore', 'event_location_link' => 'https://maps.google.com/?q=Lalit+Ashok+Bangalore', 'front_image' => 'assets/img/photos/fair/fair-6.jpg',
        'event_description' => '<p>Meet delegates from universities across the UK, USA, Ireland, Germany and Australia. Get your profile evaluated on the spot, learn about scholarships and apply with application-fee waivers.</p><ul><li>One-on-one sessions with university representatives</li><li>Free profile evaluation and course matching</li><li>Education loan and visa desks</li></ul>'],
    ['id' => 21, 'event_title' => 'Germany Chancenkarte Workshop', 'slug' => 'germany-chancenkarte-workshop', 'event_datetime' => '2026-11-22 10:00:00', 'event_location' => 'The Park, Bangalore', 'event_location_link' => 'https://maps.google.com/?q=The+Park+Bangalore', 'front_image' => 'assets/img/events/germany-workshop.jpg',
        'event_description' => '<p>A practical workshop on Germany’s Opportunity Card: points, documents, job search and how to plan your first year.</p>'],
    ['id' => 20, 'event_title' => 'Your Gateway to the 2027 Intake', 'slug' => 'gateway-2027-intake-bahrain', 'event_datetime' => '2026-12-06 10:00:00', 'event_location' => 'Kenko Asia, Bahrain', 'event_location_link' => 'https://maps.google.com/?q=Juffair+Bahrain', 'front_image' => 'assets/img/events/bahrain.jpg',
        'event_description' => '<p>Everything families in Bahrain need to plan for the 2027 intake: countries, costs, deadlines and scholarships.</p>'],
    ['id' => 19, 'event_title' => 'Study Abroad Coffee Meetup', 'slug' => 'study-abroad-coffee-meetup', 'event_datetime' => '2026-12-13 11:00:00', 'event_location' => 'Coffee Brewery, Banashankari', 'event_location_link' => 'https://maps.google.com/?q=Banashankari+Bangalore', 'front_image' => 'assets/img/events/coffee-meetup.jpg',
        'event_description' => '<p>An informal meetup with students who are studying abroad now. Bring your questions.</p>'],
];

function cg_events($limit = 6)
{
    if (cg_live()) {
        $rows = cg_query('SELECT id, event_title, slug, event_datetime, event_location, event_location_link, front_image FROM events WHERE event_datetime >= NOW() ORDER BY event_datetime ASC LIMIT ' . (int) $limit);
        return $rows ?: cg_query('SELECT id, event_title, slug, event_datetime, event_location, event_location_link, front_image FROM events ORDER BY event_datetime DESC LIMIT ' . (int) $limit);
    }
    global $CG_MOCK_EVENTS;
    return array_slice($CG_MOCK_EVENTS, 0, $limit);
}

function cg_event($slug)
{
    if (cg_live()) {
        $r = cg_query('SELECT * FROM events WHERE slug = ? LIMIT 1', [$slug]);
        return $r[0] ?? null;
    }
    global $CG_MOCK_EVENTS;
    foreach ($CG_MOCK_EVENTS as $ev) {
        if ($ev['slug'] === $slug) {
            return $ev;
        }
    }
    return null;
}

// ---------- E-books ----------
$CG_MOCK_EBOOKS = [
    ['id' => 9, 'event_title' => 'Career Gyan E-Book · November 2026', 'published_at' => '2026-11-01', 'front_image' => 'assets/img/photos/library-study.jpg'],
    ['id' => 8, 'event_title' => 'Career Gyan E-Book · October 2026', 'published_at' => '2026-10-01', 'front_image' => 'assets/img/banners/library.jpg'],
    ['id' => 7, 'event_title' => 'Career Gyan E-Book · September 2026', 'published_at' => '2026-09-01', 'front_image' => 'assets/img/banners/seminar.jpg'],
    ['id' => 6, 'event_title' => 'Career Gyan E-Book · August 2026', 'published_at' => '2026-08-01', 'front_image' => 'assets/img/banners/students-sitting.jpg'],
];

function cg_ebooks($limit = 12)
{
    if (cg_live()) {
        return cg_query('SELECT id, event_title, published_at, front_image FROM e_books ORDER BY id DESC LIMIT ' . (int) $limit);
    }
    global $CG_MOCK_EBOOKS;
    return array_slice($CG_MOCK_EBOOKS, 0, $limit);
}

// ---------- University search (all_university) ----------
function cg_universities($country = '', $course = '')
{
    if (cg_live()) {
        $where = [];
        $params = [];
        if ($country !== '') { $where[] = 'country = ?'; $params[] = $country; }
        if ($course !== '') { $where[] = 'course = ?'; $params[] = $course; }
        $sql = 'SELECT university_name, country, course, course_type, website FROM all_university'
            . ($where ? ' WHERE ' . implode(' AND ', $where) : '') . ' ORDER BY university_name ASC LIMIT 200';
        return cg_query($sql, $params);
    }
    // Mock: build rows from the country catalogue
    $out = [];
    foreach (cg_countries() as $c) {
        if ($country !== '' && strcasecmp($country, $c['name']) !== 0 && strcasecmp($country, $c['short']) !== 0) {
            continue;
        }
        foreach ($c['unis'] as $i => $u) {
            $out[] = ['university_name' => $u, 'country' => $c['name'], 'course' => $course !== '' ? $course : $c['courses'][$i % count($c['courses'])], 'course_type' => $i % 2 ? 'Masters' : 'Bachelors', 'website' => ''];
        }
    }
    return $out;
}
