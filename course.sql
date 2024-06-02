--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-06-01 14:02:21

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

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 36905)
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    idadmin integer NOT NULL,
    "nomadmin " character varying
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 36904)
-- Name: admin_idadmin_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_idadmin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_idadmin_seq OWNER TO postgres;

--
-- TOC entry 4947 (class 0 OID 0)
-- Dependencies: 217
-- Name: admin_idadmin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_idadmin_seq OWNED BY public.admin.idadmin;


--
-- TOC entry 223 (class 1259 OID 36938)
-- Name: categorie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorie (
    idcate integer NOT NULL,
    nomcate character varying
);


ALTER TABLE public.categorie OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 36937)
-- Name: categorie_idcate_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorie_idcate_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorie_idcate_seq OWNER TO postgres;

--
-- TOC entry 4948 (class 0 OID 0)
-- Dependencies: 222
-- Name: categorie_idcate_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorie_idcate_seq OWNED BY public.categorie.idcate;


--
-- TOC entry 221 (class 1259 OID 36929)
-- Name: coureur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.coureur (
    idcoureur integer NOT NULL,
    nomcoureur character varying,
    numero character varying,
    genre integer,
    datedenaissance date,
    idcategorie integer
);


ALTER TABLE public.coureur OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 36928)
-- Name: coureur_idcoureur_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.coureur_idcoureur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.coureur_idcoureur_seq OWNER TO postgres;

--
-- TOC entry 4949 (class 0 OID 0)
-- Dependencies: 220
-- Name: coureur_idcoureur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.coureur_idcoureur_seq OWNED BY public.coureur.idcoureur;


--
-- TOC entry 216 (class 1259 OID 36896)
-- Name: equipe; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipe (
    idequipe integer NOT NULL,
    nomequipe character varying
);


ALTER TABLE public.equipe OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 36895)
-- Name: equipe_idequipe_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.equipe_idequipe_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.equipe_idequipe_seq OWNER TO postgres;

--
-- TOC entry 4950 (class 0 OID 0)
-- Dependencies: 215
-- Name: equipe_idequipe_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.equipe_idequipe_seq OWNED BY public.equipe.idequipe;


--
-- TOC entry 225 (class 1259 OID 36952)
-- Name: equipecoureur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipecoureur (
    idequipec integer NOT NULL,
    idequipe integer,
    idcoureur integer
);


ALTER TABLE public.equipecoureur OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 36951)
-- Name: equipecoureur_idequipec_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.equipecoureur_idequipec_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.equipecoureur_idequipec_seq OWNER TO postgres;

--
-- TOC entry 4951 (class 0 OID 0)
-- Dependencies: 224
-- Name: equipecoureur_idequipec_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.equipecoureur_idequipec_seq OWNED BY public.equipecoureur.idequipec;


--
-- TOC entry 227 (class 1259 OID 36969)
-- Name: etape; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.etape (
    idetape integer NOT NULL,
    nometape character varying,
    longueur character varying,
    nbcoureur integer
);


ALTER TABLE public.etape OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 36968)
-- Name: etape_idetape_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.etape_idetape_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.etape_idetape_seq OWNER TO postgres;

--
-- TOC entry 4952 (class 0 OID 0)
-- Dependencies: 226
-- Name: etape_idetape_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.etape_idetape_seq OWNED BY public.etape.idetape;


--
-- TOC entry 229 (class 1259 OID 36978)
-- Name: etapeequipe; Type: TABLE; Schema: public; Owner: postgres
--

-- Table: public.rang

-- DROP TABLE IF EXISTS public.rang;

CREATE TABLE IF NOT EXISTS public.rang
(
    idrang integer NOT NULL DEFAULT nextval('rang_idrang_seq'::regclass),
    rang character varying(1) COLLATE pg_catalog."default",
    CONSTRAINT rang_pkey PRIMARY KEY (idrang)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.rang
    OWNER to postgres;

CREATE TABLE public.etapeequipe (
    "idetapeE" integer NOT NULL,
    idequipe integer,
    idcoureur integer,
    idetape integer,
    heuredepart time without time zone,
    heurearrive time without time zone,
    point integer
);


ALTER TABLE public.etapeequipe OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 36977)
-- Name: etapeequipe_idetapeE_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."etapeequipe_idetapeE_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."etapeequipe_idetapeE_seq" OWNER TO postgres;

--
-- TOC entry 4953 (class 0 OID 0)
-- Dependencies: 228
-- Name: etapeequipe_idetapeE_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."etapeequipe_idetapeE_seq" OWNED BY public.etapeequipe."idetapeE";


--
-- TOC entry 233 (class 1259 OID 37007)
-- Name: etaperang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.etaperang (
    "idetapeR" integer NOT NULL,
    idetape integer,
    idrang integer,
    point integer
);


ALTER TABLE public.etaperang OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 37006)
-- Name: etaperang_idetapeR_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."etaperang_idetapeR_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."etaperang_idetapeR_seq" OWNER TO postgres;

--
-- TOC entry 4954 (class 0 OID 0)
-- Dependencies: 232
-- Name: etaperang_idetapeR_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."etaperang_idetapeR_seq" OWNED BY public.etaperang."idetapeR";


--
-- TOC entry 235 (class 1259 OID 37024)
-- Name: etapetemps; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.etapetemps (
    "idetapeT" integer NOT NULL,
    idetape integer
);


ALTER TABLE public.etapetemps OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 37023)
-- Name: etapetemps_idetapeT_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."etapetemps_idetapeT_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."etapetemps_idetapeT_seq" OWNER TO postgres;

--
-- TOC entry 4955 (class 0 OID 0)
-- Dependencies: 234
-- Name: etapetemps_idetapeT_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."etapetemps_idetapeT_seq" OWNED BY public.etapetemps."idetapeT";


--
-- TOC entry 219 (class 1259 OID 36913)
-- Name: login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.login (
    idequipe integer,
    idadmin integer,
    password character varying,
    statu integer
);


ALTER TABLE public.login OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 37000)
-- Name: rang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rang (
    idrang integer NOT NULL,
    rang character(1)
);


ALTER TABLE public.rang OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 36999)
-- Name: rang_idrang_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rang_idrang_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rang_idrang_seq OWNER TO postgres;

--
-- TOC entry 4956 (class 0 OID 0)
-- Dependencies: 230
-- Name: rang_idrang_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rang_idrang_seq OWNED BY public.rang.idrang;


--
-- TOC entry 4738 (class 2604 OID 36908)
-- Name: admin idadmin; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin ALTER COLUMN idadmin SET DEFAULT nextval('public.admin_idadmin_seq'::regclass);


--
-- TOC entry 4740 (class 2604 OID 36941)
-- Name: categorie idcate; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorie ALTER COLUMN idcate SET DEFAULT nextval('public.categorie_idcate_seq'::regclass);


--
-- TOC entry 4739 (class 2604 OID 36932)
-- Name: coureur idcoureur; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.coureur ALTER COLUMN idcoureur SET DEFAULT nextval('public.coureur_idcoureur_seq'::regclass);


--
-- TOC entry 4737 (class 2604 OID 36899)
-- Name: equipe idequipe; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipe ALTER COLUMN idequipe SET DEFAULT nextval('public.equipe_idequipe_seq'::regclass);


--
-- TOC entry 4741 (class 2604 OID 36955)
-- Name: equipecoureur idequipec; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipecoureur ALTER COLUMN idequipec SET DEFAULT nextval('public.equipecoureur_idequipec_seq'::regclass);


--
-- TOC entry 4742 (class 2604 OID 36972)
-- Name: etape idetape; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etape ALTER COLUMN idetape SET DEFAULT nextval('public.etape_idetape_seq'::regclass);


--
-- TOC entry 4743 (class 2604 OID 36981)
-- Name: etapeequipe idetapeE; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapeequipe ALTER COLUMN "idetapeE" SET DEFAULT nextval('public."etapeequipe_idetapeE_seq"'::regclass);


--
-- TOC entry 4745 (class 2604 OID 37010)
-- Name: etaperang idetapeR; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etaperang ALTER COLUMN "idetapeR" SET DEFAULT nextval('public."etaperang_idetapeR_seq"'::regclass);


--
-- TOC entry 4746 (class 2604 OID 37027)
-- Name: etapetemps idetapeT; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapetemps ALTER COLUMN "idetapeT" SET DEFAULT nextval('public."etapetemps_idetapeT_seq"'::regclass);


--
-- TOC entry 4744 (class 2604 OID 37003)
-- Name: rang idrang; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rang ALTER COLUMN idrang SET DEFAULT nextval('public.rang_idrang_seq'::regclass);


--
-- TOC entry 4924 (class 0 OID 36905)
-- Dependencies: 218
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin (idadmin, "nomadmin ") FROM stdin;
1	admin1
2	admin2
\.


--
-- TOC entry 4929 (class 0 OID 36938)
-- Dependencies: 223
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorie (idcate, nomcate) FROM stdin;
1	senior
2	junior
\.


--
-- TOC entry 4927 (class 0 OID 36929)
-- Dependencies: 221
-- Data for Name: coureur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.coureur (idcoureur, nomcoureur, numero, genre, datedenaissance, idcategorie) FROM stdin;
\.


--
-- TOC entry 4922 (class 0 OID 36896)
-- Dependencies: 216
-- Data for Name: equipe; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipe (idequipe, nomequipe) FROM stdin;
1	equipe A
2	equipe B
3	equipe C
4	equipe D
\.


--
-- TOC entry 4931 (class 0 OID 36952)
-- Dependencies: 225
-- Data for Name: equipecoureur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipecoureur (idequipec, idequipe, idcoureur) FROM stdin;
\.


--
-- TOC entry 4933 (class 0 OID 36969)
-- Dependencies: 227
-- Data for Name: etape; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etape (idetape, nometape, longueur, nbcoureur) FROM stdin;
\.


--
-- TOC entry 4935 (class 0 OID 36978)
-- Dependencies: 229
-- Data for Name: etapeequipe; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etapeequipe ("idetapeE", idequipe, idcoureur, idetape, heuredepart, heurearrive, point) FROM stdin;
\.


--
-- TOC entry 4939 (class 0 OID 37007)
-- Dependencies: 233
-- Data for Name: etaperang; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etaperang ("idetapeR", idetape, idrang, point) FROM stdin;
\.


--
-- TOC entry 4941 (class 0 OID 37024)
-- Dependencies: 235
-- Data for Name: etapetemps; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etapetemps ("idetapeT", idetape) FROM stdin;
\.


--
-- TOC entry 4925 (class 0 OID 36913)
-- Dependencies: 219
-- Data for Name: login; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.login (idequipe, idadmin, password, statu) FROM stdin;
\.


--
-- TOC entry 4937 (class 0 OID 37000)
-- Dependencies: 231
-- Data for Name: rang; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rang (idrang, rang) FROM stdin;
\.


--
-- TOC entry 4957 (class 0 OID 0)
-- Dependencies: 217
-- Name: admin_idadmin_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_idadmin_seq', 2, true);


--
-- TOC entry 4958 (class 0 OID 0)
-- Dependencies: 222
-- Name: categorie_idcate_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorie_idcate_seq', 2, true);


--
-- TOC entry 4959 (class 0 OID 0)
-- Dependencies: 220
-- Name: coureur_idcoureur_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.coureur_idcoureur_seq', 1, false);


--
-- TOC entry 4960 (class 0 OID 0)
-- Dependencies: 215
-- Name: equipe_idequipe_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.equipe_idequipe_seq', 4, true);


--
-- TOC entry 4961 (class 0 OID 0)
-- Dependencies: 224
-- Name: equipecoureur_idequipec_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.equipecoureur_idequipec_seq', 1, false);


--
-- TOC entry 4962 (class 0 OID 0)
-- Dependencies: 226
-- Name: etape_idetape_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.etape_idetape_seq', 1, false);


--
-- TOC entry 4963 (class 0 OID 0)
-- Dependencies: 228
-- Name: etapeequipe_idetapeE_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."etapeequipe_idetapeE_seq"', 1, false);


--
-- TOC entry 4964 (class 0 OID 0)
-- Dependencies: 232
-- Name: etaperang_idetapeR_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."etaperang_idetapeR_seq"', 1, false);


--
-- TOC entry 4965 (class 0 OID 0)
-- Dependencies: 234
-- Name: etapetemps_idetapeT_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."etapetemps_idetapeT_seq"', 1, false);


--
-- TOC entry 4966 (class 0 OID 0)
-- Dependencies: 230
-- Name: rang_idrang_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rang_idrang_seq', 1, false);


--
-- TOC entry 4750 (class 2606 OID 36912)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (idadmin);


--
-- TOC entry 4754 (class 2606 OID 36945)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (idcate);


--
-- TOC entry 4752 (class 2606 OID 36936)
-- Name: coureur coureur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.coureur
    ADD CONSTRAINT coureur_pkey PRIMARY KEY (idcoureur);


--
-- TOC entry 4748 (class 2606 OID 36903)
-- Name: equipe equipe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipe
    ADD CONSTRAINT equipe_pkey PRIMARY KEY (idequipe);


--
-- TOC entry 4756 (class 2606 OID 36957)
-- Name: equipecoureur equipecoureur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipecoureur
    ADD CONSTRAINT equipecoureur_pkey PRIMARY KEY (idequipec);


--
-- TOC entry 4758 (class 2606 OID 36976)
-- Name: etape etape_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etape
    ADD CONSTRAINT etape_pkey PRIMARY KEY (idetape);


--
-- TOC entry 4760 (class 2606 OID 36983)
-- Name: etapeequipe etapeequipe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapeequipe
    ADD CONSTRAINT etapeequipe_pkey PRIMARY KEY ("idetapeE");


--
-- TOC entry 4764 (class 2606 OID 37012)
-- Name: etaperang etaperang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etaperang
    ADD CONSTRAINT etaperang_pkey PRIMARY KEY ("idetapeR");


--
-- TOC entry 4766 (class 2606 OID 37029)
-- Name: etapetemps etapetemps_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapetemps
    ADD CONSTRAINT etapetemps_pkey PRIMARY KEY ("idetapeT");


--
-- TOC entry 4762 (class 2606 OID 37005)
-- Name: rang rang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rang
    ADD CONSTRAINT rang_pkey PRIMARY KEY (idrang);


--
-- TOC entry 4769 (class 2606 OID 36946)
-- Name: coureur coureur_idcategorie_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.coureur
    ADD CONSTRAINT coureur_idcategorie_fkey FOREIGN KEY (idcategorie) REFERENCES public.categorie(idcate) NOT VALID;


--
-- TOC entry 4770 (class 2606 OID 36963)
-- Name: equipecoureur equipecoureur_idcoureur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipecoureur
    ADD CONSTRAINT equipecoureur_idcoureur_fkey FOREIGN KEY (idcoureur) REFERENCES public.coureur(idcoureur);


--
-- TOC entry 4771 (class 2606 OID 36958)
-- Name: equipecoureur equipecoureur_idequipe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipecoureur
    ADD CONSTRAINT equipecoureur_idequipe_fkey FOREIGN KEY (idequipe) REFERENCES public.equipe(idequipe);


--
-- TOC entry 4772 (class 2606 OID 36989)
-- Name: etapeequipe etapeequipe_idcoureur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapeequipe
    ADD CONSTRAINT etapeequipe_idcoureur_fkey FOREIGN KEY (idcoureur) REFERENCES public.coureur(idcoureur);


--
-- TOC entry 4773 (class 2606 OID 36984)
-- Name: etapeequipe etapeequipe_idequipe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapeequipe
    ADD CONSTRAINT etapeequipe_idequipe_fkey FOREIGN KEY (idequipe) REFERENCES public.equipe(idequipe);


--
-- TOC entry 4774 (class 2606 OID 36994)
-- Name: etapeequipe etapeequipe_idetape_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapeequipe
    ADD CONSTRAINT etapeequipe_idetape_fkey FOREIGN KEY (idetape) REFERENCES public.etape(idetape);


--
-- TOC entry 4775 (class 2606 OID 37013)
-- Name: etaperang etaperang_idetape_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etaperang
    ADD CONSTRAINT etaperang_idetape_fkey FOREIGN KEY (idetape) REFERENCES public.etape(idetape);


--
-- TOC entry 4776 (class 2606 OID 37018)
-- Name: etaperang etaperang_idrang_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etaperang
    ADD CONSTRAINT etaperang_idrang_fkey FOREIGN KEY (idrang) REFERENCES public.rang(idrang);


--
-- TOC entry 4777 (class 2606 OID 37030)
-- Name: etapetemps etapetemps_idetape_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etapetemps
    ADD CONSTRAINT etapetemps_idetape_fkey FOREIGN KEY (idetape) REFERENCES public.etape(idetape);


--
-- TOC entry 4767 (class 2606 OID 36923)
-- Name: login login_idadmin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_idadmin_fkey FOREIGN KEY (idadmin) REFERENCES public.admin(idadmin);


--
-- TOC entry 4768 (class 2606 OID 36918)
-- Name: login login_idequipe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_idequipe_fkey FOREIGN KEY (idequipe) REFERENCES public.equipe(idequipe);


-- Completed on 2024-06-01 14:02:21

--
-- PostgreSQL database dump complete
--




-- Insertion des données dans coureur
INSERT INTO public.coureur (nomcoureur, numero, genre, datedenaissance, idcategorie)
VALUES 
('John Doe', '001', 1, '1990-01-01', 1),
('Jane Smith', '002', 2, '1995-05-15', 2),
('Alice Johnson', '003', 1, '1992-03-22', 1),
('Bob Brown', '004', 2, '1998-07-30', 2),
('Chris Evans', '005', 1, '1991-06-13', 1),
('Emma Watson', '006', 2, '1994-04-15', 2),
('Michael Johnson', '007', 1, '1989-12-01', 1),
('Sarah Connor', '008', 2, '1996-07-07', 2),
('David Beckham', '009', 1, '1992-09-02', 1),
('Laura Croft', '010', 2, '1990-02-20', 2),
('James Bond', '011', 1, '1985-10-10', 1),
('Nancy Drew', '012', 2, '1997-11-11', 2),
('Peter Parker', '013', 1, '1993-05-03', 1),
('Mary Jane', '014', 2, '1995-08-12', 2),
('Bruce Wayne', '015', 1, '1988-12-18', 1),
('Diana Prince', '016', 2, '1991-03-25', 2);

INSERT INTO public.equipecoureur (idequipe, idcoureur)
VALUES 
(1, 1), (1, 2), (1, 3), (1, 4),
(2, 5), (2, 6), (2, 7), (2, 8),
(3, 9), (3, 10), (3, 11), (3, 12),
(4, 13), (4, 14), (4, 15), (4, 16);

INSERT INTO public.etape(nometape, longueur, nbcoureur)
	VALUES ('etape 1', 12, 3),
		('etape 2', 10, 2),
		('etape 3', 13, 4),
		('etape 4', 14, 3)
	;

INSERT INTO public.rang(rang)
	VALUES (1),
	(2),
	(3),
	(4),
	(5)
;

INSERT INTO public.etaperang (idetape, idrang, point)
VALUES 
-- Points pour Etape 1
(1, 1, 5), (1, 2, 4), (1, 3, 3), (1, 4, 2), (1, 5, 1),

-- Points pour Etape 2
(2, 1, 10), (2, 2, 8), (2, 3, 6), (2, 4, 4), (2, 5, 2),

-- Points pour Etape 3
(3, 1, 15), (3, 2, 12), (3, 3, 9), (3, 4, 6), (3, 5, 3),

-- Points pour Etape 4
(4, 1, 18), (4, 2, 15), (4, 3, 12), (4, 4, 9), (4, 5, 6);


select idequipe,count(idcoureur) from etapeequipe where idequipe = 4 group by idequipe 
--duree secontde

SELECT
    idcoureur,
    EXTRACT(EPOCH FROM (heurearrive - heuredepart)) AS duree_secondes
FROM
    etapeequipe;


--duree en heure

SELECT
    idcoureur,
    heuredepart,
    heurearrive,
    (heurearrive - heuredepart) AS duree
FROM
    etapeequipe order by duree;
