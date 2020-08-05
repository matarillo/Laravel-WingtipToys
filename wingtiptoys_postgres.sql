--
-- PostgreSQL database dump
--

-- Dumped from database version 10.13 (Debian 10.13-1.pgdg90+1)
-- Dumped by pg_dump version 12.2 (Ubuntu 12.2-4)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

--
-- Name: cartitems; Type: TABLE; Schema: public; Owner: wingtiptoys
--

CREATE TABLE public.cartitems (
    "ItemId" character varying(128) NOT NULL,
    "CartId" text,
    "Quantity" integer NOT NULL,
    "DateCreated" timestamp without time zone NOT NULL,
    "ProductId" integer NOT NULL
);


ALTER TABLE public.cartitems OWNER TO wingtiptoys;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: wingtiptoys
--

CREATE TABLE public.categories (
    "CategoryId" integer NOT NULL,
    "CategoryName" character varying(100) NOT NULL,
    "Description" text
);


ALTER TABLE public.categories OWNER TO wingtiptoys;

--
-- Name: orderdetails; Type: TABLE; Schema: public; Owner: wingtiptoys
--

CREATE TABLE public.orderdetails (
    "OrderDetailId" integer NOT NULL,
    "OrderId" integer NOT NULL,
    "Username" text,
    "ProductId" integer NOT NULL,
    "Quantity" integer NOT NULL,
    "UnitPrice" numeric(10,2)
);


ALTER TABLE public.orderdetails OWNER TO wingtiptoys;

--
-- Name: orderdetails_OrderDetailId_seq; Type: SEQUENCE; Schema: public; Owner: wingtiptoys
--

CREATE SEQUENCE public."orderdetails_OrderDetailId_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."orderdetails_OrderDetailId_seq" OWNER TO wingtiptoys;

--
-- Name: orderdetails_OrderDetailId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: wingtiptoys
--

ALTER SEQUENCE public."orderdetails_OrderDetailId_seq" OWNED BY public.orderdetails."OrderDetailId";


--
-- Name: orders; Type: TABLE; Schema: public; Owner: wingtiptoys
--

CREATE TABLE public.orders (
    "OrderId" integer NOT NULL,
    "OrderDate" timestamp without time zone NOT NULL,
    "Username" text,
    "FirstName" character varying(160) NOT NULL,
    "LastName" character varying(160) NOT NULL,
    "Address" character varying(70) NOT NULL,
    "City" character varying(40) NOT NULL,
    "State" character varying(40) NOT NULL,
    "PostalCode" character varying(10) NOT NULL,
    "Country" character varying(40) NOT NULL,
    "Phone" character varying(24),
    "Email" text NOT NULL,
    "Total" numeric(18,2) NOT NULL,
    "PaymentTransactionId" text,
    "HasBeenShipped" boolean NOT NULL
);


ALTER TABLE public.orders OWNER TO wingtiptoys;

--
-- Name: orders_OrderId_seq; Type: SEQUENCE; Schema: public; Owner: wingtiptoys
--

CREATE SEQUENCE public."orders_OrderId_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."orders_OrderId_seq" OWNER TO wingtiptoys;

--
-- Name: orders_OrderId_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: wingtiptoys
--

ALTER SEQUENCE public."orders_OrderId_seq" OWNED BY public.orders."OrderId";


--
-- Name: products; Type: TABLE; Schema: public; Owner: wingtiptoys
--

CREATE TABLE public.products (
    "ProductId" integer NOT NULL,
    "ProductName" character varying(100) NOT NULL,
    "Description" character varying(1000) NOT NULL,
    "ImagePath" text,
    "UnitPrice" numeric(10,2),
    "CategoryId" integer
);


ALTER TABLE public.products OWNER TO wingtiptoys;

--
-- Name: orderdetails OrderDetailId; Type: DEFAULT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.orderdetails ALTER COLUMN "OrderDetailId" SET DEFAULT nextval('public."orderdetails_OrderDetailId_seq"'::regclass);


--
-- Name: orders OrderId; Type: DEFAULT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.orders ALTER COLUMN "OrderId" SET DEFAULT nextval('public."orders_OrderId_seq"'::regclass);


--
-- Data for Name: cartitems; Type: TABLE DATA; Schema: public; Owner: wingtiptoys
--

COPY public.cartitems ("ItemId", "CartId", "Quantity", "DateCreated", "ProductId") FROM stdin;
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: wingtiptoys
--

COPY public.categories ("CategoryId", "CategoryName", "Description") FROM stdin;
1	Cars	\N
2	Planes	\N
3	Trucks	\N
4	Boats	\N
5	Rockets	\N
\.


--
-- Data for Name: orderdetails; Type: TABLE DATA; Schema: public; Owner: wingtiptoys
--

COPY public.orderdetails ("OrderDetailId", "OrderId", "Username", "ProductId", "Quantity", "UnitPrice") FROM stdin;
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: wingtiptoys
--

COPY public.orders ("OrderId", "OrderDate", "Username", "FirstName", "LastName", "Address", "City", "State", "PostalCode", "Country", "Phone", "Email", "Total", "PaymentTransactionId", "HasBeenShipped") FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: wingtiptoys
--

COPY public.products ("ProductId", "ProductName", "Description", "ImagePath", "UnitPrice", "CategoryId") FROM stdin;
1	Convertible Car	This convertible car is fast! The engine is powered by a neutrino based battery (not included).Power it up and let it go!	carconvert.png	22.50	1
2	Old-time Car	There's nothing old about this toy car, except it's looks. Compatible with other old toy cars.	carearly.png	15.95	1
3	Fast Car	Yes this car is fast, but it also floats in water.	carfast.png	32.99	1
4	Super Fast Car	Use this super fast car to entertain guests. Lights and doors work!	carfaster.png	8.95	1
5	Old Style Racer	This old style racer can fly (with user assistance). Gravity controls flight duration.No batteries required.	carracer.png	34.95	1
6	Ace Plane	Authentic airplane toy. Features realistic color and details.	planeace.png	95.00	2
7	Glider	This fun glider is made from real balsa wood. Some assembly required.	planeglider.png	4.95	2
8	Paper Plane	This paper plane is like no other paper plane. Some folding required.	planepaper.png	2.95	2
9	Propeller Plane	Rubber band powered plane features two wheels.	planeprop.png	32.95	2
10	Early Truck	This toy truck has a real gas powered engine. Requires regular tune ups.	truckearly.png	15.00	3
11	Fire Truck	You will have endless fun with this one quarter sized fire truck.	truckfire.png	26.00	3
12	Big Truck	This fun toy truck can be used to tow other trucks that are not as big.	truckbig.png	29.00	3
13	Big Ship	Is it a boat or a ship. Let this floating vehicle decide by using its artifically intelligent computer brain!	boatbig.png	95.00	4
14	Paper Boat	Floating fun for all! This toy boat can be assembled in seconds. Floats for minutes!Some folding required.	boatpaper.png	4.95	4
15	Sail Boat	Put this fun toy sail boat in the water and let it go!	boatsail.png	42.95	4
16	Rocket	This fun rocket will travel up to a height of 200 feet.	rocket.png	122.95	5
\.


--
-- Name: orderdetails_OrderDetailId_seq; Type: SEQUENCE SET; Schema: public; Owner: wingtiptoys
--

SELECT pg_catalog.setval('public."orderdetails_OrderDetailId_seq"', 1, false);


--
-- Name: orders_OrderId_seq; Type: SEQUENCE SET; Schema: public; Owner: wingtiptoys
--

SELECT pg_catalog.setval('public."orders_OrderId_seq"', 1, false);


--
-- Name: cartitems cartitems_pkey; Type: CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.cartitems
    ADD CONSTRAINT cartitems_pkey PRIMARY KEY ("ItemId");


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY ("CategoryId");


--
-- Name: orderdetails orderdetails_pkey; Type: CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.orderdetails
    ADD CONSTRAINT orderdetails_pkey PRIMARY KEY ("OrderDetailId");


--
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY ("OrderId");


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY ("ProductId");


--
-- Name: cartitems CartItem_Product; Type: FK CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.cartitems
    ADD CONSTRAINT "CartItem_Product" FOREIGN KEY ("ProductId") REFERENCES public.products("ProductId");


--
-- Name: orderdetails Order_OrderDetails; Type: FK CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.orderdetails
    ADD CONSTRAINT "Order_OrderDetails" FOREIGN KEY ("OrderId") REFERENCES public.orders("OrderId") ON DELETE CASCADE;


--
-- Name: products Product_Category; Type: FK CONSTRAINT; Schema: public; Owner: wingtiptoys
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT "Product_Category" FOREIGN KEY ("CategoryId") REFERENCES public.categories("CategoryId");


--
-- PostgreSQL database dump complete
--

