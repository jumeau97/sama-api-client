<?php

namespace App\Service;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class FileService
{
    public function __construct(private StudentRepository $studentRepository, private ManagerRegistry $manager)
    {
    }

    public function excelToStudent($file, $tmp, $parameter){

        $em = $this->manager->getManager();
        if($file!=""){

            $allowed_extension = array('xls', 'csv', 'xlsx');
            $file_array = explode(".", $file);
            $file_extension = end($file_array);
            if(in_array($file_extension, $allowed_extension)){

                $file_name = date('Y').'-'.uniqid(). '.' . $file_extension;
                // dd($file_name);


                $publicDirectory = $parameter . '/public/assets/files/';

                $sheetFilepath =  $publicDirectory . $file_name;

                move_uploaded_file($tmp, $sheetFilepath);

                ini_set('memory_limit', '1G');
                $file_type = IOFactory::identify($sheetFilepath);
                $reader = IOFactory::createReader($file_type);
                $reader->setReadDataOnly(true);
                $spreadsheet = $reader->load($sheetFilepath);
                unset($reader);
                unlink($sheetFilepath);

                $data = $spreadsheet->getActiveSheet()->toArray();

               foreach ($data as $row){
                   if (!empty($row[1]) && $row[1]!=="matricule"){
                        //$isSaved =
                       $student = new Student();
                       $student->setMatricule($row[1]);
                       $student->setLycee($row[2]);
                       $student->setNom($row[3]);
                       $student->setPrenom($row[4]);
                       $student->setNumAttestation($row[5]);
                       $student->setSexe($row[6]);
                       $student->setDateNaissance($row[7]);
                       $student->setDateNaissanceCenou($row[8]);
                       $student->setLieuNaissance($row[9]);
                       $student->setPaysNaiss($row[10]);
                       $student->setNationalite($row[11]);
                       $student->setPhone($row[12]);
                       $student->setNompere($row[13]);
                       $student->setPrenommere($row[14]);
                       $student->setNommere($row[15]);
                       $student->setPrenommere($row[16]);
                       $student->setMatriculeDEF($row[17]);
                       $student->setMatricule($row[18]);
                       $student->setAnneeBac($row[19]);
                       $student->setSerie($row[20]);
                       $student->setNumPlace($row[21]);
                       $student->setStatut($row[22]);
                       $student->setCentreBac($row[23]);
                       $student->setAe($row[24]);
                       $student->setAdresseparent($row[25]);
                       $student->setPhone1($row[26]);
                       $student->setEtablissement($row[27]);
                       $student->setIdBanq($row[28]);
                       $student->setScolarite($row[29]);
                       $student->setBacMention($row[30]);
                       $student->setMoyenneEcrit($row[31]);
                       $student->setMoyenneAnuelle($row[32]);
                       $student->setMoyenneAdmission($row[33]);
                       $student->setAnneeNaissance($row[34]);
                       $student->setAnneeDEF($row[35]);
                       $student->setScolariteNew($row[36]);
                       $student->setScolariteNew2($row[37]);
                       $student->setAge($row[38]);
                       $student->setInscriptibiliteAge($row[39]);
                       $student->setInscriptibiliteNationale($row[40]);
                       $student->setInscriptibiliteGenerale($row[41]);

                       set_time_limit(20000);
                       $em->persist($student);
                       $em->flush();
                   }
               }
            }
            return new JsonResponse(["message"=>"Success uploaded and imported.","status"=>"201"]);
        }


    }
}