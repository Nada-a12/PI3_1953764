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

# il faut commencer par mentionner notre dataset de personnes déjà connues
# photos > <nom de la personne> > photo(s)
personnes = datasets.ImageFolder('../personnes')
label = {i:c for c,i in personnes.class_to_idx.items()}

# process list of samples
def collate_fn(a):
    return a[0]

loader = DataLoader(personnes, collate_fn=collate_fn)

vecteur_faces = [] # liste des faces
vecteur_labels = [] # liste des noms des faces
vecteur_caracteristiques_faces = [] # liste des caracteristiques importantes de la face après conversion avec resnet

for img, idx in loader:
    face, probabilite = mtcnnkeepfalse(img, return_prob=True)
    if face is not None and probabilite>0.92:
        caracteristiques = inceptionresnet(face.unsqueeze(0))
        vecteur_caracteristiques_faces.append(caracteristiques.detach())
        vecteur_labels.append(label[idx])

# sauvgarder les valeurs dans un fichier pytorch
donnees = [vecteur_caracteristiques_faces, vecteur_labels]
torch.save(donnees, '../donnees.pt')
print("Dataset généré")