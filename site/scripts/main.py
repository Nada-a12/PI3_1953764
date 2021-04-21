#! /usr/bin/python3
# importation des modules
from facenet_pytorch import MTCNN, InceptionResnetV1
import torch
from torchvision import datasets
from torch.utils.data import DataLoader
from PIL import Image
import cv2
import time
import os
import numpy as np
from matplotlib import pyplot

# initialisation de mtcnn et de inceptionresnet
mtcnnkeepfalse = MTCNN(image_size=240, margin=0, keep_all=False, min_face_size=40)
mtcnnkeeptrue = MTCNN(image_size=240, margin=0, keep_all=True, min_face_size=40)
inceptionresnet = InceptionResnetV1(pretrained='vggface2').eval()

# charger les donnees
charger_donnees = torch.load('donnees.pt')
vecteur_caracteristiques_faces = charger_donnees[0]
vecteur_labels = charger_donnees[1]

image = pyplot.imread('verify/personne.jpg')

os.system('rm verify/resultat.jpg')

# reconvertir le vecteur extrait de notre caméra en image
faces_decoupees_liste, probabilite_liste = mtcnnkeeptrue(image, return_prob=True)
if faces_decoupees_liste is not None:
    coordonnees_faces, _ = mtcnnkeeptrue.detect(image)
    for i, probabilite in enumerate(probabilite_liste):
        if probabilite>0.90:
            caracteristiques = inceptionresnet(faces_decoupees_liste[i].unsqueeze(0)).detach()
            distance_faces_liste = []

            # distance entre les caracteristiques
            for idx, emb_db in enumerate(vecteur_caracteristiques_faces):
                distance = torch.dist(caracteristiques, emb_db).item()
                distance_faces_liste.append(distance)

            distance_minimale = min(distance_faces_liste)
            distance_minimale_label = distance_faces_liste.index(distance_minimale)
            label = vecteur_labels[distance_minimale_label]

            coordonnees_face = coordonnees_faces[i]

            camera_enregistrement = image.copy()

            if distance_minimale<0.90:
                vecteurcamera = cv2.putText(image, label, (coordonnees_face[0],coordonnees_face[1]), cv2.FONT_HERSHEY_TRIPLEX, .6, (0,0,255),1, cv2.LINE_AA)
                vecteurcamera = cv2.rectangle(image, (coordonnees_face[0], coordonnees_face[1]), (coordonnees_face[2], coordonnees_face[3]), (0,255,0), 2)
                cv2.imwrite('verify/resultat.jpg', vecteurcamera)
                print('Bonjour, '+label+'!')
                print(round(distance_minimale, 6))
            else:
                print('Vous ne faites pas partie des personnes autorisées.')
        else:
            print('Aucune face n\'a été détectée')