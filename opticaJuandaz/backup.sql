PGDMP  &                 
    {            software    16.0    16.0 L    Q           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            R           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            S           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            T           1262    16477    software    DATABASE     {   CREATE DATABASE software WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE software;
                postgres    false                        2615    16839    optica    SCHEMA        CREATE SCHEMA optica;
    DROP SCHEMA optica;
                postgres    false            �            1259    25058    access_id_seq    SEQUENCE     y   CREATE SEQUENCE optica.access_id_seq
    START WITH 1000
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE optica.access_id_seq;
       optica          postgres    false    5            �            1259    25071    access    TABLE     �  CREATE TABLE optica.access (
    id_access character varying DEFAULT ('AC'::text || lpad((nextval('optica.access_id_seq'::regclass))::text, 6, '0'::text)) NOT NULL,
    id_role character(5) NOT NULL,
    name_access character varying(120) NOT NULL,
    surname_access character varying(120) NOT NULL,
    document_access character varying(20) NOT NULL,
    date_birth_access date NOT NULL,
    date_admission_access date NOT NULL,
    phone_access character varying(10) NOT NULL,
    years_experience_access character varying(2) NOT NULL,
    email_access character varying(255) NOT NULL,
    address_access character varying(50) NOT NULL,
    sex_access character(1) NOT NULL,
    password_access character varying(25) NOT NULL,
    status_access boolean NOT NULL,
    token_access text NOT NULL,
    location_departament_id character varying(10) NOT NULL,
    location_city_id character varying(10) NOT NULL,
    CONSTRAINT access_sex_access_check CHECK ((sex_access = ANY (ARRAY['M'::bpchar, 'F'::bpchar])))
);
    DROP TABLE optica.access;
       optica         heap    postgres    false    219    5            �            1259    25041    city    TABLE     �   CREATE TABLE optica.city (
    id_city character varying(10) NOT NULL,
    id_departament character varying(10) NOT NULL,
    name_city character varying(100) NOT NULL
);
    DROP TABLE optica.city;
       optica         heap    postgres    false    5            �            1259    25036    departament    TABLE     �   CREATE TABLE optica.departament (
    id_departament character varying(10) NOT NULL,
    name_departament character varying(100) NOT NULL
);
    DROP TABLE optica.departament;
       optica         heap    postgres    false    5            �            1259    25146    detail    TABLE     �   CREATE TABLE optica.detail (
    id_detail integer NOT NULL,
    id_medical_history character varying(6),
    id_service character varying
);
    DROP TABLE optica.detail;
       optica         heap    postgres    false    5            �            1259    25145    detail_id_detail_seq    SEQUENCE     �   CREATE SEQUENCE optica.detail_id_detail_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE optica.detail_id_detail_seq;
       optica          postgres    false    229    5            U           0    0    detail_id_detail_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE optica.detail_id_detail_seq OWNED BY optica.detail.id_detail;
          optica          postgres    false    228            �            1259    25059    employee_seq    SEQUENCE     z   CREATE SEQUENCE optica.employee_seq
    START WITH 202301
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE optica.employee_seq;
       optica          postgres    false    5            �            1259    25122    quote_id_seq    SEQUENCE     t   CREATE SEQUENCE optica.quote_id_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE optica.quote_id_seq;
       optica          postgres    false    5            �            1259    25137    medical_history    TABLE     �  CREATE TABLE optica.medical_history (
    id_medical_history character varying DEFAULT ('MHP'::text || lpad((nextval('optica.quote_id_seq'::regclass))::text, 3, '0'::text)) NOT NULL,
    od_lensometry character varying(50),
    oi_lensometry character varying(50),
    add_lensometry character varying(50),
    farvisualacuityod_sc character varying(50),
    farvisualacuityoi_sc character varying(50),
    farvisualacuityod_cc character varying(50),
    farvisualacuityoi_cc character varying(50),
    farvisualacuityod_ph character varying(50),
    farvisualacuityoi_ph character varying(50),
    nearvisualacuity_a_od_sc character varying(50),
    acuityvisualnearoi_sc character varying(50),
    acuityvisualnearod_cc character varying(50),
    acuityvisualnearoi_cc character varying(50),
    acuityvisualnearod_ph character varying(50),
    acuityvisualnearoi_ph character varying(50),
    keratometriahorizontal_od character varying(50),
    keratometriahorizontal_oi character varying(50),
    keratometriavertical_od character varying(50),
    keratometriavertical_oi character varying(50),
    keratometriaeje_oi character varying(50),
    keratometriadifferential_od character varying(50),
    keratometriadifferential_oi character varying(50),
    refractionsphere_od character varying(50),
    refractionsphere_oi character varying(50),
    refractioncilindro_od character varying(50),
    refractionaxis_od character varying(50),
    refractionaxis_oi character varying(50),
    refractionaddition_od character varying(50),
    refractionaddition_oi character varying(50),
    subjectivesphere_od character varying(50),
    subjectivesphere_oi character varying(50),
    subjectivecylinder_od character varying(50),
    subjectivecylinder_oi character varying(50),
    subjectiveeje_od character varying(50),
    subjectiveeje_oi character varying(50),
    subjectiveadd_od character varying(50),
    subjectiveadd_oi character varying(50),
    subjectivedp_od character varying(50),
    acuityvisualdistancefar_od character varying(50),
    acuityvisualdistancefar_oi character varying(50),
    acuityvisualdistancenear_od character varying(50),
    acuityvisualdistancenear_oi character varying(50),
    observation text,
    recommendation text,
    diagnostic text
);
 #   DROP TABLE optica.medical_history;
       optica         heap    postgres    false    224    5            �            1259    25136    medical_history_id_seq    SEQUENCE     ~   CREATE SEQUENCE optica.medical_history_id_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE optica.medical_history_id_seq;
       optica          postgres    false    5            �            1259    25097    person_id_seq    SEQUENCE     u   CREATE SEQUENCE optica.person_id_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE optica.person_id_seq;
       optica          postgres    false    5            �            1259    25098    person    TABLE     �  CREATE TABLE optica.person (
    id_person character varying DEFAULT ('PA'::text || lpad((nextval('optica.person_id_seq'::regclass))::text, 6, '0'::text)) NOT NULL,
    birth_date_person date,
    entity_person character varying(255),
    age_person integer,
    name_person character varying(255),
    occupation_person character varying(255),
    document_person character varying(255),
    city_person character varying,
    phone_person character varying(255),
    location_departament_id character varying,
    location_city_id character varying,
    surname character varying(255),
    CONSTRAINT person_age_person_check CHECK ((age_person > 0))
);
    DROP TABLE optica.person;
       optica         heap    postgres    false    222    5            �            1259    25123    quote    TABLE     U  CREATE TABLE optica.quote (
    id_quote character varying DEFAULT ('RS'::text || lpad((nextval('optica.quote_id_seq'::regclass))::text, 6, '0'::text)) NOT NULL,
    id_person character varying NOT NULL,
    date_quote date NOT NULL,
    hour_quote time without time zone NOT NULL,
    cod_secretary character(6) NOT NULL,
    token text
);
    DROP TABLE optica.quote;
       optica         heap    postgres    false    224    5            �            1259    25172    quote_service    TABLE     �   CREATE TABLE optica.quote_service (
    id_quoser integer NOT NULL,
    id_quote character varying(10) NOT NULL,
    id_service character varying(10) NOT NULL
);
 !   DROP TABLE optica.quote_service;
       optica         heap    postgres    false    5            �            1259    25171    quote_service_id_quoser_seq    SEQUENCE     �   CREATE SEQUENCE optica.quote_service_id_quoser_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE optica.quote_service_id_quoser_seq;
       optica          postgres    false    233    5            V           0    0    quote_service_id_quoser_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE optica.quote_service_id_quoser_seq OWNED BY optica.quote_service.id_quoser;
          optica          postgres    false    232            �            1259    25051    role_id_sequence    SEQUENCE     x   CREATE SEQUENCE optica.role_id_sequence
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE optica.role_id_sequence;
       optica          postgres    false    5            �            1259    25052    role    TABLE     �   CREATE TABLE optica.role (
    id_role character(5) DEFAULT ('R'::text || lpad((nextval('optica.role_id_sequence'::regclass))::text, 4, '0'::text)) NOT NULL,
    name_role character varying(70) NOT NULL
);
    DROP TABLE optica.role;
       optica         heap    postgres    false    217    5            �            1259    25157    service_id_seq    SEQUENCE     v   CREATE SEQUENCE optica.service_id_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE optica.service_id_seq;
       optica          postgres    false    5            �            1259    25158    service    TABLE     b  CREATE TABLE optica.service (
    id_service character varying DEFAULT ('SE'::text || lpad((nextval('optica.service_id_seq'::regclass))::text, 3, '0'::text)) NOT NULL,
    id_medical_history character varying(10) NOT NULL,
    name_optometrist character varying(255) NOT NULL,
    cod_optometrist character(6) NOT NULL,
    id_quoser integer NOT NULL
);
    DROP TABLE optica.service;
       optica         heap    postgres    false    230    5            �            1259    25188    service_id_quoser_seq    SEQUENCE     �   CREATE SEQUENCE optica.service_id_quoser_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE optica.service_id_quoser_seq;
       optica          postgres    false    231    5            W           0    0    service_id_quoser_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE optica.service_id_quoser_seq OWNED BY optica.service.id_quoser;
          optica          postgres    false    234            �           2604    25149    detail id_detail    DEFAULT     t   ALTER TABLE ONLY optica.detail ALTER COLUMN id_detail SET DEFAULT nextval('optica.detail_id_detail_seq'::regclass);
 ?   ALTER TABLE optica.detail ALTER COLUMN id_detail DROP DEFAULT;
       optica          postgres    false    228    229    229            �           2604    25175    quote_service id_quoser    DEFAULT     �   ALTER TABLE ONLY optica.quote_service ALTER COLUMN id_quoser SET DEFAULT nextval('optica.quote_service_id_quoser_seq'::regclass);
 F   ALTER TABLE optica.quote_service ALTER COLUMN id_quoser DROP DEFAULT;
       optica          postgres    false    232    233    233            �           2604    25189    service id_quoser    DEFAULT     v   ALTER TABLE ONLY optica.service ALTER COLUMN id_quoser SET DEFAULT nextval('optica.service_id_quoser_seq'::regclass);
 @   ALTER TABLE optica.service ALTER COLUMN id_quoser DROP DEFAULT;
       optica          postgres    false    234    231            A          0    25071    access 
   TABLE DATA           6  COPY optica.access (id_access, id_role, name_access, surname_access, document_access, date_birth_access, date_admission_access, phone_access, years_experience_access, email_access, address_access, sex_access, password_access, status_access, token_access, location_departament_id, location_city_id) FROM stdin;
    optica          postgres    false    221   l       <          0    25041    city 
   TABLE DATA           B   COPY optica.city (id_city, id_departament, name_city) FROM stdin;
    optica          postgres    false    216   �m       ;          0    25036    departament 
   TABLE DATA           G   COPY optica.departament (id_departament, name_departament) FROM stdin;
    optica          postgres    false    215   �m       I          0    25146    detail 
   TABLE DATA           K   COPY optica.detail (id_detail, id_medical_history, id_service) FROM stdin;
    optica          postgres    false    229   �m       G          0    25137    medical_history 
   TABLE DATA             COPY optica.medical_history (id_medical_history, od_lensometry, oi_lensometry, add_lensometry, farvisualacuityod_sc, farvisualacuityoi_sc, farvisualacuityod_cc, farvisualacuityoi_cc, farvisualacuityod_ph, farvisualacuityoi_ph, nearvisualacuity_a_od_sc, acuityvisualnearoi_sc, acuityvisualnearod_cc, acuityvisualnearoi_cc, acuityvisualnearod_ph, acuityvisualnearoi_ph, keratometriahorizontal_od, keratometriahorizontal_oi, keratometriavertical_od, keratometriavertical_oi, keratometriaeje_oi, keratometriadifferential_od, keratometriadifferential_oi, refractionsphere_od, refractionsphere_oi, refractioncilindro_od, refractionaxis_od, refractionaxis_oi, refractionaddition_od, refractionaddition_oi, subjectivesphere_od, subjectivesphere_oi, subjectivecylinder_od, subjectivecylinder_oi, subjectiveeje_od, subjectiveeje_oi, subjectiveadd_od, subjectiveadd_oi, subjectivedp_od, acuityvisualdistancefar_od, acuityvisualdistancefar_oi, acuityvisualdistancenear_od, acuityvisualdistancenear_oi, observation, recommendation, diagnostic) FROM stdin;
    optica          postgres    false    227   n       C          0    25098    person 
   TABLE DATA           �   COPY optica.person (id_person, birth_date_person, entity_person, age_person, name_person, occupation_person, document_person, city_person, phone_person, location_departament_id, location_city_id, surname) FROM stdin;
    optica          postgres    false    223   -n       E          0    25123    quote 
   TABLE DATA           b   COPY optica.quote (id_quote, id_person, date_quote, hour_quote, cod_secretary, token) FROM stdin;
    optica          postgres    false    225   uo       M          0    25172    quote_service 
   TABLE DATA           H   COPY optica.quote_service (id_quoser, id_quote, id_service) FROM stdin;
    optica          postgres    false    233   p       >          0    25052    role 
   TABLE DATA           2   COPY optica.role (id_role, name_role) FROM stdin;
    optica          postgres    false    218   ;p       K          0    25158    service 
   TABLE DATA           o   COPY optica.service (id_service, id_medical_history, name_optometrist, cod_optometrist, id_quoser) FROM stdin;
    optica          postgres    false    231   �p       X           0    0    access_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('optica.access_id_seq', 1016, true);
          optica          postgres    false    219            Y           0    0    detail_id_detail_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('optica.detail_id_detail_seq', 1, false);
          optica          postgres    false    228            Z           0    0    employee_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('optica.employee_seq', 202301, false);
          optica          postgres    false    220            [           0    0    medical_history_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('optica.medical_history_id_seq', 0, false);
          optica          postgres    false    226            \           0    0    person_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('optica.person_id_seq', 51, true);
          optica          postgres    false    222            ]           0    0    quote_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('optica.quote_id_seq', 29, true);
          optica          postgres    false    224            ^           0    0    quote_service_id_quoser_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('optica.quote_service_id_quoser_seq', 1, false);
          optica          postgres    false    232            _           0    0    role_id_sequence    SEQUENCE SET     >   SELECT pg_catalog.setval('optica.role_id_sequence', 3, true);
          optica          postgres    false    217            `           0    0    service_id_quoser_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('optica.service_id_quoser_seq', 1, false);
          optica          postgres    false    234            a           0    0    service_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('optica.service_id_seq', 0, false);
          optica          postgres    false    230            �           2606    25079    access access_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY optica.access
    ADD CONSTRAINT access_pkey PRIMARY KEY (id_access);
 <   ALTER TABLE ONLY optica.access DROP CONSTRAINT access_pkey;
       optica            postgres    false    221            �           2606    25045    city city_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY optica.city
    ADD CONSTRAINT city_pkey PRIMARY KEY (id_city);
 8   ALTER TABLE ONLY optica.city DROP CONSTRAINT city_pkey;
       optica            postgres    false    216            �           2606    25040    departament departament_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY optica.departament
    ADD CONSTRAINT departament_pkey PRIMARY KEY (id_departament);
 F   ALTER TABLE ONLY optica.departament DROP CONSTRAINT departament_pkey;
       optica            postgres    false    215            �           2606    25151    detail detail_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY optica.detail
    ADD CONSTRAINT detail_pkey PRIMARY KEY (id_detail);
 <   ALTER TABLE ONLY optica.detail DROP CONSTRAINT detail_pkey;
       optica            postgres    false    229            �           2606    25144 $   medical_history medical_history_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY optica.medical_history
    ADD CONSTRAINT medical_history_pkey PRIMARY KEY (id_medical_history);
 N   ALTER TABLE ONLY optica.medical_history DROP CONSTRAINT medical_history_pkey;
       optica            postgres    false    227            �           2606    25106    person person_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY optica.person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id_person);
 <   ALTER TABLE ONLY optica.person DROP CONSTRAINT person_pkey;
       optica            postgres    false    223            �           2606    25130    quote quote_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY optica.quote
    ADD CONSTRAINT quote_pkey PRIMARY KEY (id_quote);
 :   ALTER TABLE ONLY optica.quote DROP CONSTRAINT quote_pkey;
       optica            postgres    false    225            �           2606    25177     quote_service quote_service_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY optica.quote_service
    ADD CONSTRAINT quote_service_pkey PRIMARY KEY (id_quoser);
 J   ALTER TABLE ONLY optica.quote_service DROP CONSTRAINT quote_service_pkey;
       optica            postgres    false    233            �           2606    25057    role role_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY optica.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id_role);
 8   ALTER TABLE ONLY optica.role DROP CONSTRAINT role_pkey;
       optica            postgres    false    218            �           2606    25165    service service_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY optica.service
    ADD CONSTRAINT service_pkey PRIMARY KEY (id_service);
 >   ALTER TABLE ONLY optica.service DROP CONSTRAINT service_pkey;
       optica            postgres    false    231            �           2606    25081    access un_email 
   CONSTRAINT     R   ALTER TABLE ONLY optica.access
    ADD CONSTRAINT un_email UNIQUE (email_access);
 9   ALTER TABLE ONLY optica.access DROP CONSTRAINT un_email;
       optica            postgres    false    221            �           2606    25152 %   detail detail_id_medical_history_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY optica.detail
    ADD CONSTRAINT detail_id_medical_history_fkey FOREIGN KEY (id_medical_history) REFERENCES optica.medical_history(id_medical_history);
 O   ALTER TABLE ONLY optica.detail DROP CONSTRAINT detail_id_medical_history_fkey;
       optica          postgres    false    4759    229    227            �           2606    25046    city fk_departament    FK CONSTRAINT     �   ALTER TABLE ONLY optica.city
    ADD CONSTRAINT fk_departament FOREIGN KEY (id_departament) REFERENCES optica.departament(id_departament);
 =   ALTER TABLE ONLY optica.city DROP CONSTRAINT fk_departament;
       optica          postgres    false    4745    216    215            �           2606    25166    service fk_id_medical_history    FK CONSTRAINT     �   ALTER TABLE ONLY optica.service
    ADD CONSTRAINT fk_id_medical_history FOREIGN KEY (id_medical_history) REFERENCES optica.medical_history(id_medical_history);
 G   ALTER TABLE ONLY optica.service DROP CONSTRAINT fk_id_medical_history;
       optica          postgres    false    231    4759    227            �           2606    25190    service fk_id_quoser    FK CONSTRAINT     �   ALTER TABLE ONLY optica.service
    ADD CONSTRAINT fk_id_quoser FOREIGN KEY (id_quoser) REFERENCES optica.quote_service(id_quoser);
 >   ALTER TABLE ONLY optica.service DROP CONSTRAINT fk_id_quoser;
       optica          postgres    false    4765    233    231            �           2606    25178    quote_service fk_id_quote    FK CONSTRAINT        ALTER TABLE ONLY optica.quote_service
    ADD CONSTRAINT fk_id_quote FOREIGN KEY (id_quote) REFERENCES optica.quote(id_quote);
 C   ALTER TABLE ONLY optica.quote_service DROP CONSTRAINT fk_id_quote;
       optica          postgres    false    4757    225    233            �           2606    25092    access fk_id_role    FK CONSTRAINT     t   ALTER TABLE ONLY optica.access
    ADD CONSTRAINT fk_id_role FOREIGN KEY (id_role) REFERENCES optica.role(id_role);
 ;   ALTER TABLE ONLY optica.access DROP CONSTRAINT fk_id_role;
       optica          postgres    false    221    4749    218            �           2606    25183    quote_service fk_id_service    FK CONSTRAINT     �   ALTER TABLE ONLY optica.quote_service
    ADD CONSTRAINT fk_id_service FOREIGN KEY (id_service) REFERENCES optica.service(id_service);
 E   ALTER TABLE ONLY optica.quote_service DROP CONSTRAINT fk_id_service;
       optica          postgres    false    4763    233    231            �           2606    25202    detail fk_id_service    FK CONSTRAINT     �   ALTER TABLE ONLY optica.detail
    ADD CONSTRAINT fk_id_service FOREIGN KEY (id_service) REFERENCES optica.service(id_service);
 >   ALTER TABLE ONLY optica.detail DROP CONSTRAINT fk_id_service;
       optica          postgres    false    229    4763    231            �           2606    25087    access fk_location_city    FK CONSTRAINT     �   ALTER TABLE ONLY optica.access
    ADD CONSTRAINT fk_location_city FOREIGN KEY (location_city_id) REFERENCES optica.city(id_city);
 A   ALTER TABLE ONLY optica.access DROP CONSTRAINT fk_location_city;
       optica          postgres    false    221    216    4747            �           2606    25082    access fk_location_departament    FK CONSTRAINT     �   ALTER TABLE ONLY optica.access
    ADD CONSTRAINT fk_location_departament FOREIGN KEY (location_departament_id) REFERENCES optica.departament(id_departament);
 H   ALTER TABLE ONLY optica.access DROP CONSTRAINT fk_location_departament;
       optica          postgres    false    215    4745    221            �           2606    25107    person person_city_person_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY optica.person
    ADD CONSTRAINT person_city_person_fkey FOREIGN KEY (city_person) REFERENCES optica.city(id_city);
 H   ALTER TABLE ONLY optica.person DROP CONSTRAINT person_city_person_fkey;
       optica          postgres    false    4747    223    216            �           2606    25117 #   person person_location_city_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY optica.person
    ADD CONSTRAINT person_location_city_id_fkey FOREIGN KEY (location_city_id) REFERENCES optica.city(id_city);
 M   ALTER TABLE ONLY optica.person DROP CONSTRAINT person_location_city_id_fkey;
       optica          postgres    false    223    4747    216            �           2606    25112 *   person person_location_departament_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY optica.person
    ADD CONSTRAINT person_location_departament_id_fkey FOREIGN KEY (location_departament_id) REFERENCES optica.departament(id_departament);
 T   ALTER TABLE ONLY optica.person DROP CONSTRAINT person_location_departament_id_fkey;
       optica          postgres    false    215    4745    223            �           2606    25131    quote quote_id_person_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY optica.quote
    ADD CONSTRAINT quote_id_person_fkey FOREIGN KEY (id_person) REFERENCES optica.person(id_person);
 D   ALTER TABLE ONLY optica.quote DROP CONSTRAINT quote_id_person_fkey;
       optica          postgres    false    4755    223    225            A   }  x���Mk�@��ʯ�q��+��a�6)�����IK�I�����~'m�Bh}1�y4��3�]3��b�=��yy���zG��\�~7�-}�W�2c�Q K�8T�,��gR��N�h;�xؔuW�����VS�f��T1ќ J�`�v��#GD������I(���u.���ؙ�_�m��Y�˞R+�㋅�ޘ�6�"�7·�1�xXA86��r��u����8����d��r���4�p��$�=�ˌQ1�ByE߻�?��	8�\5�.��p�yiy��:��ή��q��6�C��?�=����w� ��J���#���`6�ug4�n�&��v���v�瑒[X�F�{3�<X�Փ��?1��      <   !   x�3�4��ON<�1���I,*J����� ^��      ;   "   x�3���/*IUHIUN�+I�KI-����� n��      I      x������ � �      G      x������ � �      C   8  x����j�0���S�	�mɱ}���<z���h��=���-dxPd�����d������>/����饑���?���fK�:}L��'�\*)�%|L8����]��y�N���"�=zȠ�E �QV,�
fz3˘��æg	�:�Y���H�}ok��*T}�푱[GG�K���x��,^�%jN�)�qЕ��O�8�2*� ����r�Τ)���p�k�����^�D{��u�݃��A{���{�w�d�����І��
m�@Ʀ�-ՉNĠ؂�oQw��w��;���*Z���u�o��      E   �   x�}�A
�@���)���O&�$�/ u�H��k�t��Y<�tC{���C�\�DgpB@�tZ����P"nd���J��x/ ��T*+?�U!��G�]��B	>�_�ʮ4)����:jĎ�!9 ����3�m�
Ata�|/9�M�;�      M      x������ � �      >   <   x�2 ����ԒĢ�D�  ߐӥ4��Fǈӿ�$?7���7�tL�������� U��      K      x������ � �     